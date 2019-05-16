<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProfesionesTest extends TestCase
{
    /**
     *
     * @test
     */
    function prueba_ruta_profesiones()
    {
        $response = $this->get('/profesiones')
        ->assertStatus(200)
        ->assertSee('profesiones');

    }

    /**
     * @test
     */
    function prueba_palabra_ome()
    {
        $response = $this->get('/profesiones')
        ->assertStatus(200)
        ->assertSee('ome');
    }
}
