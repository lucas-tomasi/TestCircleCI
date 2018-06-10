<?php
namespace Deployer;

require 'recipe/common.php';

// Project name
set('application', 'TestCircleCI');

// Project repository
set('repository', 'https://github.com/lucas-tomasi/TestCircleCI.git');

// [Optional] Allocate tty for git clone. Default value is false.
set('git_tty', true); 

// Shared files/dirs between deploys 
set('shared_files', []);
set('shared_dirs', []);

// Writable dirs by web server 
set('writable_dirs', []);


// Hosts

host('138.68.174.210')
    ->set('deploy_path', '~/{{application}}')
    ->identityFile('~/.ssh/id_sra')
    ->set('git_tty', true);
    ->user('lucas-tomasi');    
    

// Tasks

desc('Deploy your project');
task('deploy', [
    'deploy:info',
    'deploy:prepare',
    'deploy:lock',
    'deploy:release',
    'deploy:update_code',
    'deploy:shared',
    'deploy:writable',
    'deploy:vendors',
    'deploy:clear_paths',
    'deploy:symlink',
    'deploy:unlock',
    'cleanup',
    'success'
]);

// [Optional] If deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');
