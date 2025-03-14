namespace Database\Factories;

use App\Models\Batch;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class BatchFactory extends Factory
{
    protected $model = Batch::class;

    public function definition(): array
    {
        return [
            'nro_lote' => $this->faker->unique()->bothify('LOT-#####'),
            'product_id' => Product::factory(), // Creates a linked product automatically
        ];
    }
}
