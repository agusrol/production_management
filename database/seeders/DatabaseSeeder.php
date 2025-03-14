namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Employee;
use App\Models\Product;
use App\Models\Task;
use App\Models\Batch;
use App\Models\TimeEntry;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Create 10 Users with Employees
        Employee::factory(10)->create();

        // Create 10 Products
        Product::factory(10)->create();

        // Create 20 Tasks
        Task::factory(20)->create();

        // Create 30 Batches
        Batch::factory(30)->create();

        // Create 50 Time Entries
        TimeEntry::factory(200)->create();
    }
}
