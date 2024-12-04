<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class CreateUser extends Command {
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'user:create';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Create a basic user';

	/**
	 * Execute the console command.
	 *
	 * @return int
	 */
	public function handle(): int {
		$name     = $this->ask( 'What should we call this user?' );
		$password = $this->secret( 'What is the password?' );
		$email    = $this->ask( 'What is the email addresss? (this is the login name)' );

		$errors = false;

		try {
			User::create( [
				'name'     => $name,
				'email'    => $email,
				'password' => bcrypt( $password ),
			] );

			$this->info( 'User Created' );
		} catch ( \Exception $exception ) {

			$errors = true;
			$this->error( 'Something exploded, hope this helps:' );
			$this->error( $exception->getMessage() );
		}

		return $errors;
	}
}
