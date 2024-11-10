<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Restaurant;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Eddy',
            'email' => 'eddy@gmail.com',
            'password' => bcrypt('password')
        ]);

        Restaurant::insert([
            [
                "id" => "1",
                "name" => "ARU",
                "address" => "268 Little Collins St, Melbourne VIC 3000",
                "image" =>
                "https://www.visitvictoria.com/-/media/atdw/melbourne/food-and-wine/restaurants/bd1891f91909aeec93145f8be24060ab_1600x1200.jpeg?ts=20210630360540",
                "price" => "$$$",
                "type" => "Fine Dining",
            ],
            [
                "id" => "2",
                "name" => "AU 79",
                "address" => "287 Lonsdale St, Melbourne VIC 3000",
                "image" =>
                "https://www.au79cafe.com.au/wp-content/uploads/2018/05/AU79_EMD_March2018_076.jpg",
                "price" => "$$$",
                "type" => "Cafe",
            ],
            [
                "id" => "3",
                "name" => "ABC CHICKEN",
                "address" => "361 Queen St, Melbourne VIC 3000",
                "image" =>
                "https://d1ralsognjng37.cloudfront.net/ce6ae77e-ba1e-42c5-b247-8034a32e71e3.jpeg",
                "price" => "$$",
                "type" => "Casual Dining",
            ],
            [
                "id" => "4",
                "name" => "BETTY'S BURGER",
                "address" => "97 Elizabeth St, Melbourne VIC 3000",
                "image" =>
                "https://www.darlingharbour.com/getmedia/a48d8d97-c3d0-488b-99fd-169ec5062be5/bettys-burgers-7.jpg",
                "price" => "$$",
                "type" => "Fast Casual",
            ],
            [
                "id" => "5",
                "name" => "BRUNETTI",
                "address" => "250 Flinders Ln, Melbourne VIC 3000",
                "image" =>
                "https://media.timeout.com/images/103562002/750/422/image.jpg",
                "price" => "$$",
                "type" => "Cafe",
            ],
            [
                "id" => "6",
                "name" => "CALIA",
                "address" => "Shop 31A/287 Lonsdale St, Melbourne VIC 3000",
                "image" =>
                "https://lh3.googleusercontent.com/p/AF1QipMiazAxraky1g7QySynMGXNjSzIqGJHCbFxDFSJ=w1080-h608-p-no-v0",
                "price" => "$$",
                "type" => "Fine Dining",
            ],
            [
                "id" => "7",
                "name" => "CRINITI'S",
                "address" => "645 Freshwater Pl, Southbank VIC 3006",
                "image" =>
                "https://media-cdn.tripadvisor.com/media/photo-s/13/df/1a/a3/australia-s-longest-italian.jpg",
                "price" => "$$",
                "type" => "Fine Dining",
            ],
            [
                "id" => "8",
                "name" => "CHIN CHIN",
                "address" => "125 Flinders Ln, Melbourne VIC 3000",
                "image" =>
                "https://www.chinchinrestaurant.com.au/melbourne/wp-content/uploads/sites/2/2022/11/beef-shortrib-45-1360x910.jpg",
                "price" => "$$",
                "type" => "Casual Dining",
            ],
            [
                "id" => "9",
                "name" => "DODEE PAIDANG",
                "address" => "Basement/353 Little Collins St, Melbourne VIC 3000",
                "image" =>
                "https://tb-static.uber.com/prod/image-proc/processed_images/62389eef2f8599321b654ee05055ac9a/9ba9ffab5f885fc3dac87838b3357014.jpeg",
                "price" => "$$",
                "type" => "Fast Casual",
            ],
            [
                "id" => "10",
                "name" => "DRAGON HOTPOT",
                "address" => "213 Russell St, Melbourne VIC 3000",
                "image" =>
                "https://images.squarespace-cdn.com/content/v1/5d22f329b4af6200010ddef9/1616667270664-EO1M1DDF6CQ3J1967ABG/DHP+Main+Banner+03-01.jpg?format=1500w",
                "price" => "$$",
                "type" => "Fast Casual",
            ],
            [
                "id" => "11",
                "name" => "HAKATA GENSUKE",
                "address" => "200 Lonsdale St, Melbourne VIC 3000",
                "image" =>
                "https://cdn.broadsheet.com.au/cache/91/b9/91b96e7c295dcabf3039a9663e6a6f0e.jpg",
                "price" => "$$",
                "type" => "Fast Casual",
            ],
            [
                "id" => "12",
                "name" => "HUMBLE RAYS",
                "address" => "71 Bouverie St, Carlton VIC 3053",
                "image" =>
                "https://whatson.melbourne.vic.gov.au/rails/active_storage/representations/proxy/eyJfcmFpbHMiOnsibWVzc2FnZSI6IkJBaEpJaWt4TW1ZMk1qY3hNeTFpTnpNeExUUmtabVV0T1RNNVlpMWlOV1kwTWpZNE56TXhNV01HT2daRlZBPT0iLCJleHAiOm51bGwsInB1ciI6ImJsb2JfaWQifX0=--3de8f7fb3cd409296d574400a59c6857966f108c/eyJfcmFpbHMiOnsibWVzc2FnZSI6IkJBaDdCem9MWm05eWJXRjBTU0lJYW5CbkJqb0dSVlE2RkhKbGMybDZaVjkwYjE5c2FXMXBkRnNIYVFLdUFta0N6QUU9IiwiZXhwIjpudWxsLCJwdXIiOiJ2YXJpYXRpb24ifX0=--7f9630e3134fed9b847d81e33e693bfd37ddddf1/humble6.jpg",
                "price" => "$$",
                "type" => "Cafe",
            ],
            [
                "id" => "13",
                "name" => "Jang Gun CBD Korean Restaurant",
                "address" => "3/21 Healeys Ln, Melbourne VIC 3000",
                "image" =>
                "https://static.wixstatic.com/media/1c8083_b6ebfc5b07904232ad4b32b8eddf9db3~mv2.jpeg/v1/fill/w_2500,h_2000,al_c/1c8083_b6ebfc5b07904232ad4b32b8eddf9db3~mv2.jpeg",
                "price" => "$$",
                "type" => "Fast Casual",
            ],
            [
                "id" => "14",
                "name" => "Ling Nan Chinese Restaurant",
                "address" => "207 Lonsdale St, Melbourne VIC 3000",
                "image" =>
                "https://d1ralsognjng37.cloudfront.net/a445bc30-be01-42cf-a585-5ba6ee435636.jpeg",
                "price" => "$$",
                "type" => "Casual Dining",
            ],
            [
                "id" => "15",
                "name" => "MANSAE",
                "address" => "Shop 9/120 A\'Beckett St, Melbourne VIC 3000",
                "image" =>
                "https://d1ralsognjng37.cloudfront.net/84d01c7f-113d-4fe0-b48e-e23305414d65.jpeg",
                "price" => "$$",
                "type" => "Casual Dining",
            ],
            [
                "id" => "16",
                "name" => "Nelayan Restaurant",
                "address" => "195 Lonsdale St, Melbourne VIC 3000",
                "image" =>
                "https://i0.wp.com/www.angsarap.net/wp-content/uploads/2019/06/Nelayan-Restaurant-05.jpg?ssl=1",
                "price" => "$$",
                "type" => "Casual Dining",
            ],
            [
                "id" => "17",
                "name" => "Pepper Lunch",
                "address" => "1/155 Franklin St, Melbourne VIC 3000",
                "image" =>
                "https://jontotheworld.com/wp-content/uploads/2022/02/Pepper-Lunch-4.jpg",
                "price" => "$$",
                "type" => "Casual Dining",
            ],
            [
                "id" => "18",
                "name" => "Palermo",
                "address" => "401 Little Bourke St, Melbourne VIC 3000",
                "image" =>
                "https://images.squarespace-cdn.com/content/v1/5d00cba62da74a00016c6b01/1658207343467-K5ZNYFMAKHE9V3VP7CGR/twocan_palermo_jul-99.jpg?format=1500w",
                "price" => "$$$",
                "type" => "Fine Dining",
            ],
            [
                "id" => "19",
                "name" => "SECRET KITCHEN",
                "address" => "222 Exhibition St, Melbourne VIC 3000",
                "image" =>
                "https://thecitylane.com/wp-content/uploads/2023/01/DSCF7457.jpg",
                "price" => "$$$",
                "type" => "Casual Dining",
            ],
            [
                "id" => "20",
                "name" => "Stalactites",
                "address" => "177/183 Lonsdale St, Melbourne VIC 3000",
                "image" =>
                "https://images.squarespace-cdn.com/content/v1/5adeaca231d4dfcf091567b3/1525050699290-0CSDEF1746HMKAUHZ1IP/27573.jpg?format=1000w",
                "price" => "$$$",
                "type" => "Fine Dining",
            ],
            [
                "id" => "21",
                "name" => "Ten Square Cafe",
                "address" => "120 Hardware St, Melbourne VIC 3000",
                "image" =>
                "https://media-cdn.tripadvisor.com/media/photo-s/17/ca/64/73/lunch-covered.jpg",
                "price" => "$$$",
                "type" => "Cafe",
            ],
            [
                "id" => "22",
                "name" => "Son In Law",
                "address" =>
                "Ella Precinct, opposite to Ajisen Ramen, 211 La Trobe St, Melbourne VIC 3000",
                "image" =>
                "https://secretmelbourne.com/wp-content/uploads/2023/01/son-in-law.jpeg",
                "price" => "$",
                "type" => "Casual Dining",
            ],
            [
                "id" => "23",
                "name" => "Unabara",
                "address" => "Central, L01/211 La Trobe St, Melbourne VIC 3000",
                "image" =>
                "https://i0.wp.com/unabara.com.au/wp-content/uploads/2022/10/202A6283.jpg?fit=2000%2C1438&ssl=1",
                "price" => "$$$",
                "type" => "Fine Dining",
            ],
            [
                "id" => "24",
                "name" => "Vegie Tribe",
                "address" => "Central, L01/211 La Trobe St, Melbourne VIC 3000",
                "image" =>
                "https://img.grouponcdn.com/deal/2fsyxwMEwX51DFAVeQeNKvZrkJVt/2f-2048x1229/v1/c870x524.jpg",
                "price" => "$",
                "type" => "Fast Casual",
            ],
            [
                "id" => "25",
                "name" => "YOI",
                "address" => "1/155 Franklin St, Melbourne VIC 3000",
                "image" => "https://media.timeout.com/images/105728243/image.jpg",
                "price" => "$$$",
                "type" => "Casual Dining",
            ],
        ]);
    }
}
