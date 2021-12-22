<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;


class PageSeeder extends Seeder
{
  /**
   * Run the database seeds.
   * @return void
   */
  public function run()
  {
    // php artisan db:seed --class=PageSeeder

    $page = new Page();
    $page->title   = 'Contact us';
    $page->slug    = 'contact-us';
    $page->content = 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Est, blanditiis! Reiciendis sint itaque dicta perspiciatis fugit, blanditiis incidunt maiores nulla modi? Ea eveniet quia exercitationem, iure eius asperiores suscipit pariatur distinctio magnam? Excepturi magni illum, natus maiores autem corrupti error suscipit hic facilis dolores dolorum, modi corporis! Laborum adipisci totam explicabo, repudiandae magni, ex dignissimos sapiente nihil maiores atque sint sequi suscipit animi obcaecati cumque mollitia nostrum dolore provident doloribus vero id recusandae. Suscipit qui amet nesciunt ipsa totam error ex molestias veritatis blanditiis, deserunt repellat dolores, quae inventore doloremque, quod aliquid iste obcaecati eius repellendus sit. Quibusdam quisquam animi voluptatem repellendus tenetur non, voluptates nulla quos sapiente, corrupti, aliquam libero rem ipsam velit sed dolor voluptate fugit magnam molestiae a quaerat similique repellat consequatur? Debitis dolor eveniet, quae velit sit nihil adipisci in ipsa, numquam sint iste? Quam maxime, modi eveniet rem sunt, officia accusantium nostrum possimus eligendi, earum quo fuga sed quis et suscipit eaque ipsum corrupti facilis. Ratione consequatur atque rerum ad, sed quaerat recusandae, eveniet excepturi, nemo necessitatibus ullam autem eius nobis commodi ipsa veniam sapiente? Neque ullam eos ea esse, atque a et voluptates culpa similique unde impedit. Voluptatem dolore consectetur dolorum alias quisquam non?';
    $page->save();
    

    $page = new Page();
    $page->title   = 'About us';
    $page->slug    = 'about-us';
    $page->content = 'Excepturi magni illum, natus maiores autem corrupti error suscipit hic facilis dolores dolorum, modi corporis! Laborum adipisci totam explicabo, repudiandae magni, ex dignissimos sapiente nihil maiores atque sint sequi suscipit animi obcaecati cumque mollitia nostrum dolore provident doloribus vero id recusandae. Suscipit qui amet nesciunt ipsa totam error ex molestias veritatis blanditiis, deserunt repellat dolores, quae inventore doloremque, quod aliquid iste obcaecati eius repellendus sit. Quam maxime, modi eveniet rem sunt, officia accusantium nostrum possimus eligendi, earum quo fuga sed quis et suscipit eaque ipsum corrupti facilis. Ratione consequatur atque rerum ad, sed quaerat recusandae, eveniet excepturi, nemo necessitatibus ullam autem eius nobis commodi ipsa veniam sapiente? Neque ullam eos ea esse, atque a et voluptates culpa similique unde impedit. Lorem, ipsum dolor sit amet consectetur adipisicing elit. Est, blanditiis! Reiciendis sint itaque dicta perspiciatis fugit, blanditiis incidunt maiores nulla modi? Ea eveniet quia exercitationem, iure eius asperiores suscipit pariatur distinctio magnam? Debitis dolor eveniet, quae velit sit nihil adipisci in ipsa, numquam sint iste? Voluptatem dolore consectetur dolorum alias quisquam non? Quibusdam quisquam animi voluptatem repellendus tenetur non, voluptates nulla quos sapiente, corrupti, aliquam libero rem ipsam velit sed dolor voluptate fugit magnam molestiae a quaerat similique repellat consequatur?';
    $page->save();

  }

}
