namespace Database\Factories;

use App\Models\TimeEntry;
use App\Models\Task;
use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

class TimeEntryFactory extends Factory
{
    protected $model = TimeEntry::class;

    public function definition(): array
    {
        return [
            'fecha_inicio' => $this->faker->dateTimeBetween('-1 month', 'now'),
            'fecha_fin' => $this->faker->optional()->dateTimeBetween('now', '+1 week'),
            'task_id' => Task::factory(),
            'employee_id' => Employee::factory(),
        ];
    }
}
