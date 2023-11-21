<?php namespace Visiosoft\RecipesModule\Recipe\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use phpseclib3\Net\SSH2;
use Visiosoft\RecipesModule\Log\Command\CreateLog;
use Visiosoft\RecipesModule\Recipe\Contract\RecipeInterface;
use Visiosoft\ServerModule\Server\Contract\ServerInterface;
use Visiosoft\SiteModule\Helpers\Formatters;
use Visiosoft\SiteModule\Helpers\Log;
use Visiosoft\SiteModule\Site\Contract\SiteInterface;

//class RunRecipe implements ShouldQueue
class RunRecipe
{
//    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected SiteInterface $site;
    protected RecipeInterface $recipe;
    protected ServerInterface $server;

    public function __construct(SiteInterface $site, RecipeInterface $recipe)
    {
        $this->site = $site;
        $this->recipe = $recipe;
    }

    public function handle()
    {
        try {
            $replaces = [
                'site_full_path' => "/home/" . $this->site->getUsername() . "/web",
            ];

            $server = $this->site->server;
            $serverPassword = $server->getPassword();
            $commands = preg_split('/\r\n/', trim($this->recipe->getCommands()));

            $ssh = new SSH2($server->getIp(), 22);
            $ssh->login('pure', $serverPassword);
            $ssh->setTimeout(360);

            $output = array();
            foreach ($commands as $command) {
                $command = (new Formatters)->strReplace($command, $replaces, '{', '}');
                $command = str_replace('sudo', 'echo ' . $serverPassword . " | sudo -S", $command);
                $output[] = $ssh->exec($command);
            }

            $ssh->exec('exit');
            /**
             * Save Output log
             */
            $log = new CreateLog($this->recipe, $this->site, implode('\r\n', $output));
            $log->save();

        } catch (\Exception $exception) {
            (new Log())->createLog('run_recipe', $exception);
        }
    }
}
