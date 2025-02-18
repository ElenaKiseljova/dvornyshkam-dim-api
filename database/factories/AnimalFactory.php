<?php

namespace Database\Factories;

use App\Models\Animal;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class AnimalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $DATA_IMAGES = [
            'dogs' => [
                'https://cdn.pixabay.com/photo/2022/05/09/18/05/dog-7185274_1280.jpg',
                'https://cdn.pixabay.com/photo/2021/05/09/06/07/dog-6240043_1280.jpg',
                'https://cdn.pixabay.com/photo/2019/11/07/08/40/puppy-4608266_1280.jpg',
                'https://cdn.pixabay.com/photo/2014/08/21/14/51/dog-423398_1280.jpg',
                'https://cdn.pixabay.com/photo/2023/08/18/15/02/dog-8198719_1280.jpg',
                'https://cdn.pixabay.com/photo/2021/07/07/14/40/dog-6394502_1280.jpg',
                'https://cdn.pixabay.com/photo/2017/03/27/13/23/dog-2178696_1280.jpg',
                'https://cdn.pixabay.com/photo/2020/11/22/20/12/schafer-dog-5767834_1280.jpg',
                'https://cdn.pixabay.com/photo/2021/03/09/14/33/dog-6082017_1280.jpg',
                'https://cdn.pixabay.com/photo/2019/08/19/07/45/corgi-4415649_1280.jpg',
            ],

            'cats' => [
                'https://media.istockphoto.com/id/176028173/uk/%D1%84%D0%BE%D1%82%D0%BE/%D1%81%D0%B8%D0%B4%D1%8F%D1%87%D0%B0-%D0%BA%D1%96%D1%88%D0%BA%D0%B0-%D0%B2-%D0%BF%D1%80%D0%BE%D1%84%D1%96%D0%BB%D1%8C.jpg?s=2048x2048&w=is&k=20&c=HgMyT3jN6nmCh33fkkJHJun3-MFB6BtCAvGdNB4BoQQ=',
                'https://media.istockphoto.com/id/914620886/uk/%D1%84%D0%BE%D1%82%D0%BE/%D1%81%D0%B8%D0%BC%D0%BF%D0%B0%D1%82%D0%B8%D1%87%D0%BD%D0%B0-%D1%96%D0%BC%D0%B1%D0%B8%D1%80%D0%BD%D0%B0-%D0%BA%D1%96%D1%88%D0%BA%D0%B0-%D0%BA%D0%BE%D0%BB%D0%BE%D0%BB%D0%B0-%D0%B2%D1%83%D1%85%D0%B0-%D0%B2-%D0%BD%D0%B0%D1%81%D1%82%D0%BE%D1%80%D0%BE%D0%B6%D0%B5%D0%BD%D0%BD%D1%96.jpg?s=2048x2048&w=is&k=20&c=jmqrt3CQWZtzRTxBPma08iyBmkxzxzTWnw6B-HG0Anw=',
                'https://media.istockphoto.com/id/1885866215/uk/%D1%84%D0%BE%D1%82%D0%BE/veterinarian-examines-the-pet.jpg?s=2048x2048&w=is&k=20&c=CaS38k6wj79tF1aKUOv479gSYudrDQXqt2AY79I-aSc=',
                'https://cdn.pixabay.com/photo/2023/09/21/17/05/european-shorthair-8267220_1280.jpg',
                'https://media.istockphoto.com/id/2122766215/uk/%D1%84%D0%BE%D1%82%D0%BE/%D0%BA%D1%96%D1%88%D0%BA%D0%B0-%D0%B7-%D0%BB%D0%B0%D0%BF%D0%BE%D1%8E-%D0%B2-%D0%BF%D0%BE%D0%B2%D1%96%D1%82%D1%80%D1%96-%D0%BD%D0%B0-%D0%BF%D1%80%D0%B8%D1%80%D0%BE%D0%B4%D1%96-%D0%BD%D0%B0-%D0%B2%D1%83%D0%BB%D0%B8%D1%86%D1%96-%D1%80%D1%83%D0%B4%D0%B8%D0%B9-%D0%BA%D0%BE%D1%88%D0%B5%D0%BD%D1%8F-%D1%81%D0%B8%D0%B4%D0%B8%D1%82%D1%8C-%D0%BD%D0%B0-%D0%BA%D0%B2%D1%96%D1%82%D0%BA%D0%BE%D0%B2%D1%96%D0%B9-%D0%B3%D0%B0%D0%BB%D1%8F%D0%B2%D0%B8%D0%BD%D1%96-%D0%B2.jpg?s=2048x2048&w=is&k=20&c=qmR5LLLOGTFqgItIPDntF7xPuNvHi0HORWXWoQbbzy8=',
                'https://media.istockphoto.com/id/858769392/uk/%D1%84%D0%BE%D1%82%D0%BE/%D0%BA%D0%BE%D1%88%D0%B5%D0%BD%D1%8F-%D0%BD%D0%B0-%D0%B7%D0%B5%D0%BB%D0%B5%D0%BD%D1%96%D0%B9-%D1%82%D1%80%D0%B0%D0%B2%D1%96-%D0%BD%D0%B0-%D0%B2%D1%96%D0%B4%D0%BA%D1%80%D0%B8%D1%82%D0%BE%D0%BC%D1%83-%D0%BF%D0%BE%D0%B2%D1%96%D1%82%D1%80%D1%96.jpg?s=2048x2048&w=is&k=20&c=EKpwHJDBft01GlKTfMkim3mw6qMS9SpyZRfZheKXfuk=',
                'https://cdn.pixabay.com/photo/2024/05/18/08/16/tomcat-8769861_1280.jpg',
                'https://cdn.pixabay.com/photo/2021/12/01/18/17/cat-6838844_1280.jpg',
                'https://cdn.pixabay.com/photo/2023/07/22/08/54/european-shorthair-8142959_1280.jpg',
                'https://cdn.pixabay.com/photo/2022/01/17/09/42/cat-6944230_1280.jpg',
            ],
        ];

        $category = mt_rand(0, 1) ? Animal::CATEGORIES[0] : Animal::CATEGORIES[1];
        $gender = mt_rand(0, 1) ? Animal::GENDERS[0] : Animal::GENDERS[1];
        $image = $DATA_IMAGES[$category][mt_rand(0, 9)];
        $images = [];

        foreach (range(0, mt_rand(0, 10)) as $index) {
            $images[] = $DATA_IMAGES[$category][mt_rand(0, 9)];
        }

        return [
            'slug' => fake()->slug(),
            'category' => $category,
            'name' => fake()->name(),
            'birthday' => fake()->date('Y-m-d', date('Y-m-d', strtotime('-1 month'))),
            'gender' => $gender,
            'weight' => mt_rand(1, 100),
            'image' => $image,
            'images' => implode(', ', $images),
            'animal_friendly' => mt_rand(0, 1),
            'vaccinated' => mt_rand(0, 1),
        ];
    }
}
