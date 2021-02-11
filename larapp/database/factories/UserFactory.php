<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $gender = $this->faker->randomElement($array = array('Female', 'Male'));
        
        if($gender == 'Female') {
        	$fullName = $this->faker->firstNameFemale;
        }else{
        	$fullName = $this->faker->firstNameMale;
        }

        return [
            'fullname'          => $fullName ,
            'email'             => $this->faker->unique()->safeEmail,
            'phone'             => $this->faker->numberBetween($min = 3101000000, $max = 3202000000),
            'birthdate'         => $this->faker->dateTimeBetween($startDate = '-60 years', $endDate = '-21 years'),
            'gender'            => $gender,
            'address'           => $this->faker->streetAddress,
            'photo'				=> $this->faker->image('public/imgs', 160, 160, 'people'),
            'role'              => 'Editor',  
            'email_verified_at' => now(),
            'password'          => bcrypt('editor'), 
            'remember_token'    => Str::random(10),
        ];
    }
}
