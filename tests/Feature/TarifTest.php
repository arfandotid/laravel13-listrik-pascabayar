<?php

namespace Tests\Feature;

use App\Models\Tarif;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TarifTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_can_create_a_tarif_with_mass_assignment(): void
    {
        $data = [
            'daya' => 900,
            'tarifperkwh' => 1352.50,
        ];

        $tarif = Tarif::create($data);

        // Assert data is successfully saved in the database
        $this->assertDatabaseHas('tarif', $data);

        // Assert model instance has the correct attributes
        $this->assertEquals(900, $tarif->daya);
        $this->assertEquals(1352.50, $tarif->tarifperkwh);
    }
}
