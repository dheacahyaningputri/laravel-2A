<?php

namespace Tests\Feature;

use Tests\TestCase;

class MahasiswaAndKalkulatorTest extends TestCase
{
    public function test_student_list_displays_all_requested_students(): void
    {
        $this->get('/daftar/mahasiswa')
            ->assertOk()
            ->assertSeeText('Ruang Akademik')
            ->assertSeeText('Welcome To My Web')
            ->assertSee(route('mahasiswa.index'), false)
            ->assertSee(route('kalkulator.segitiga'), false)
            ->assertSee('aria-current="page"', false)
            ->assertSeeText('Daftar Mahasiswa')
            ->assertSeeText('Anton')
            ->assertSeeText('Surabaya')
            ->assertSeeText('Budi')
            ->assertSeeText('Kediri')
            ->assertSeeText('Ani')
            ->assertSeeText('Malang')
            ->assertSeeText('Sinta')
            ->assertSeeText('Gender');
    }

    public function test_triangle_calculator_displays_form_and_calculates_area(): void
    {
        $this->get('/kalkulator/segitiga')
            ->assertOk()
            ->assertSeeText('Ruang Akademik')
            ->assertSeeText('Welcome To My Web')
            ->assertSee(route('mahasiswa.index'), false)
            ->assertSee(route('kalkulator.segitiga'), false)
            ->assertSee('aria-current="page"', false)
            ->assertSeeText('Kalkulator Luas Segitiga')
            ->assertSee('name="alas"', false)
            ->assertSee('name="tinggi"', false);

        $this->post('/kalkulator/segitiga', ['alas' => 10, 'tinggi' => 6])
            ->assertOk()
            ->assertSeeText('30');
    }

    public function test_triangle_calculator_validates_required_dimensions(): void
    {
        $this->from('/kalkulator/segitiga')
            ->post('/kalkulator/segitiga', ['alas' => '', 'tinggi' => ''])
            ->assertRedirect('/kalkulator/segitiga')
            ->assertSessionHasErrors(['alas', 'tinggi']);
    }
}
