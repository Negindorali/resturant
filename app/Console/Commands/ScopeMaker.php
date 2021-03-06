<?php

namespace App\Console\Commands;

use App\Models\Role;
use Illuminate\Console\Command;

class ScopeMaker extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:scope {scope}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Making a scope for Roles';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $this->saveScopes();
        $role= Role::findOrFail(1);

        $scopes= json_decode($role->scope);
        $scopes[] =$this->argument("scope");

        $role->update([
           Role::SCOPE =>json_encode(array_unique($scopes))
        ]);
         echo "Your scope added successfully!\n";
    }

    public function  saveScopes():void
    {
        if(!file_exists("role"))
            file_put_contents("role","");

        $roles = file_get_contents("role");
        $roles= explode("\n",$roles);
        array_push($roles,$this->argument("scope"));

        $roles = array_filter((array)array_unique($roles));


        $file = fopen("role","w");
        fwrite($file,implode("\n",$roles));
        fclose($file);



    }
}
