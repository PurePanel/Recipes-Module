<?php namespace Visiosoft\RecipesModule\Recipe\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use phpseclib3\Net\SSH2;
use Visiosoft\RecipesModule\Recipe\Contract\RecipeInterface;
use Visiosoft\ServerModule\Server\Contract\ServerInterface;
use Visiosoft\SiteModule\Site\Contract\SiteInterface;

class RunRecipe implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

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
        $server = $this->site->server;
        $serverPassword = $server->getPassword();
        $commands = preg_split('/\r\n/', trim($this->recipe->getCommands()));

        $ssh = new SSH2($server->getIp(), 22);
        $ssh->login('pure', $serverPassword);
        $ssh->setTimeout(360);

        $output = array();

        foreach ($commands as $command) {
            $output[] = $ssh->exec('echo ' . $serverPassword . " | sudo -S $command");
        }
        $ssh->exec('exit');
    }
}
