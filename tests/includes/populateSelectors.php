<?php 

    define('SAFETORUN', true);
    require '../../includes/populateSelectors.php';
    use PHPUnit\Framework\TestCase;

    class SomeTests extends TestCase{
        public function testSuccessPopulateSelector(){
            $expected = '<option value=\'1\'>bob</option><br>';
            $input = [['id' => 1, 'name'=> 'bob']];
            $case = populateSelector($input);
            $this->assertEquals($expected, $case);
        }

        public function testFailurePopulateSelector(){
            $expected = '<option value=\'1\'>bob</option><br>';
            $input = [['id' => 2, 'name'=> 'neil']];
            $case = populateSelector($input);
            $this->assertNotEquals($expected, $case);
        }

        public function testMalformedPopulateSelector(){
            $expected = '';
            $input = 'string';
            $this->expectException(TypeError::class, $case);
            $case = populateSelector($input);
        }
    }