<?php

namespace Tests\Feature;

use Tests\TestCase;

class ProductTest extends TestCase
{
    /**
     * Testing validation for requiring name.
     *
     * @return void
     */
    public function test_required_name_validation()
    {   
        $inputData = [
            'name' => '', 
            'description' => 'Lorem ipsum dolor sit amet.',
            'price' => 1,
        ];

        $response = $this->postJson('/product', $inputData);
        
        $response->assertJsonValidationErrors([
            'name' => 'The name field is required.'
        ]);
    }

    /**
     * Testing validation for max characters of description.
     *
     * @return void
     */
    public function test_max_description_validation()
    {   
        $inputData = [
            'name' => 'Sample Test', 
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, 
                sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris 
                nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in 
                reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla 
                pariatur. Excepteur sint occaecat cupidatat non proident, sunt in 
                culpa qui officia deserunt mollit anim id est laborum.',
            'price' => 1,
        ];

        $response = $this->postJson('/product', $inputData);
        
        $response->assertJsonValidationErrors([
            'description' => 'The description may not be greater than 255 characters.'
        ]);
    }
}
