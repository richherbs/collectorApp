<?php 
    define('SAFETORUN', true);
    require '../../includes/displayBikes.php';
    use PHPUnit\Framework\TestCase;

    class SomeTests extends TestCase{
        public function testSuccessPrintCards(){
            $expected = "<div class='card'><img class='bike-image' src='1' alt='1 1 bike'><div class=\"card-info-container\"><section>Make: 1</section><section>Model: 1</section><section>Discipline: 1</section><section>Wheel Size: 1</section></div><div class='card-button-container'><form method='get' action='editPage.php'><button type='submit' name='edit' value='1'>Edit Bike</button></form><form method='get'><button type='submit' name='delete' value='1'>Delete Bike</button></form></div></div>";
            $input = [['id'=>1,'pic_url'=>1,'brand_name'=>1,'model'=>1,'discipline_name'=>1,'wheel_diameter'=>1]];
            $case = printCards($input);
            $this->assertEquals($expected, $case);
        }

        public function testFailurePrintCards(){
            $expected = "<div class='card'><img class='bike-image' src='1' alt='1 1 bike'><div class=\"card-info-container\"><section>Make: 1</section><section>Model: 1</section><section>Discipline: 1</section><section>Wheel Size: 1</section></div><div class='card-button-container'><form method='get' action='editPage.php'><button type='submit' name='edit' value='1'>Edit Bike</button></form><form method='get'><button type='submit' name='delete' value='1'>Delete Bike</button></form></div></div>";
            $input = [['id'=>2, 'pic_url'=>1,'brand_name'=>1,'model'=>1,'discipline_name'=>1,'wheel_diameter'=>1]];
            $case = printCards($input);
            $this->assertNotEquals($expected, $case);
        }

        public function testMalformedPrintCards(){
            $input = 'string';
            $this->expectException(TypeError::class);
            $case = printCards($input);
        }
    }