<?php 

    define('SAFETORUN', true);
    require '../../includes/populateSelectors.php';
    use PHPUnit\Framework\TestCase;

    class SomeTests extends TestCase{
        public function testSuccessPopulateSelector(){
            $expected = '<option value=\'1\'>bob</option><br>';
            $inputArray = [['id' => 1, 'name'=> 'bob']];
            $inputString = '';
            $case = populateSelector($inputArray, $inputString);
            $this->assertEquals($expected, $case);
        }

        public function testFailurePopulateSelector(){
            $expected = '<option value=\'1\'>bob</option><br>';
            $inputArray = [['id' => 2, 'name'=> 'neil']];
            $inputString = '';
            $case = populateSelector($inputArray, $inputString);
            $this->assertNotEquals($expected, $case);
        }

        public function testMalformedPopulateSelector(){
            $expected = '';
            $inputNonArray = 'string';
            $inputNonString = 74;
            $this->expectException(TypeError::class);
            $case = populateSelector($inputNonArray, $inputNonString);
        }
    }