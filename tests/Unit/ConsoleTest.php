<?php
namespace Tests\Console;

use Illuminate\Console\Scheduling\Schedule;
use Tests\TestCase;

class ConsoleTest extends TestCase
{
    public function testScheduleContainsInspireCommand()
    {
        // Mock jadwal
        $schedule = $this->app->make(Schedule::class);

        // Panggil jadwal langsung menggunakan closure
        $kernel = new \App\Console\Kernel($this->app, $this->app['events']);
        $reflection = new \ReflectionMethod($kernel, 'schedule');
        $reflection->setAccessible(true); // Bypass protected access
        $reflection->invoke($kernel, $schedule);

        // Periksa apakah 'inspire' ada dalam jadwal
        $events = collect($schedule->events());
        $this->assertTrue(
            $events->contains(function ($event) {
                return str_contains($event->command, 'inspire');
            }),
            "Command 'inspire' tidak ditemukan di jadwal"
        );
    }
}