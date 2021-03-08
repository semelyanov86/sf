<?php

namespace Parents\Commands;

use Domains\Users\Models\User;
use Illuminate\Console\Command;

class SetupDevEnvironment extends Command
{
    protected $signature = 'dev:setup';

    protected $description = 'Sets up the development environment';

    public function handle(): int
    {
        $this->info('Setting up development environment');
        $this->migrateAndSeedDatabase();
        $user = $this->createRegularUser();
        $this->createPersonalAccessClient($user);
        $this->createPersonalAccessToken($user);
        $this->info('All done. Bye!');
        return 0;
    }

    public function migrateAndSeedDatabase(): void
    {
        $this->call('migrate:fresh');
        $this->call('db:seed');
    }

    public function createRegularUser(): User
    {
        $this->info('Creating regular user');
        $user = User::factory()->make([
            'name' => 'Regular User',
            'email' => 'user@user.com',
            'password' => bcrypt('secret'),
            'team_id' => 1
        ]);
        $this->info('Regular user created');
        $this->warn('Email: user@user.com');
        $this->warn('Password: secret');
        return $user;
    }

    public function createPersonalAccessClient(User $user): void
    {
        $this->call('passport:client', [
            '--personal' => true,
            '--name' => 'Personal Access Client',
            '--user_id' => $user->id
        ]);
    }

    public function createPersonalAccessToken(User $user): void
    {
        $token = $user->createToken('Development Token');
        $this->info('Personal access token created successfully');
        $this->warn('Personal access token:');
        $this->line($token->accessToken);
    }
}
