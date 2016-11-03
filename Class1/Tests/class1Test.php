<?php
namespace Class1\Tests;

use Class1\Person;
use Class1\Repairment;
use Class1\Car AS Car;

Class class1Test extends \PHPUnit_Framework_TestCase
{
    /**
     * First of all we are going to test that we as person can exist
     */
    public function testPersonExists()
    {
        $person = new Person();
        if ( $person instanceof Person ){
            return $this->assertTrue( true );

        }
        $this->assertTrue( false );
    }
    /**
     *
     */
    public function testRepairmentClassExists()
    {
        $repairment = new Repairment();
        if ( $repairment instanceof Repairment ){
            return $this->assertTrue( true );

        }
        $this->assertTrue( false );
    }
    /**
     *
     */
    public function testCarClassExists()
    {
        $car = new Car();
        if ( $car instanceof Car ){
            return $this->assertTrue( true );

        }
        $this->assertTrue( false );
    }
    /**
     * @depends testRepairmentClassExists
     */
    public function testMethodPullOutTyreExistsOnRepairment()
    {
        $repairment = new Repairment();
        if ( in_array( 'pullOutTyre', get_class_methods( $repairment ) ) ){
            return $this->assertTrue( true );
        }
        $this->assertTrue( false );
    }
    /**
     * @depends testMethodPullOutTyreExistsOnRepairment
     */
    public function testPullOutTyreTakesCarsOnly()
    {
        $reflection = new \ReflectionClass( 'Class1\Repairment' );
        $reflectionMethod = $reflection->getMethod( 'pullOutTyre' );
        $parameters = $reflectionMethod->getParameters();

        if( $parameters[0]->getClass()->name === 'Class1\Car' ){
            return $this->assertTrue( true );
        }
        $this->assertTrue( false );

    }

    /* CLASE 2*/

    /**
     * @dataProvider carProvider
     */

    public function testExistProperttMarca(Car $car1,Car $car2,Car $car3){

        $cars = array($car1,$car2,$car3);
        $i=1;
        foreach($cars as $car) {
            $reflection[$i] = new \ReflectionClass($car);
            $ok = in_array('marca',array_keys($reflection[$i]->getDefaultProperties()));
            $i++;
        }
        $ok == true ?$this->assertTrue( true ): $this->assertTrue(false);

    }

    /**
     * @depends testExistProperttMarca
     * @dataProvider carProvider
     */

    public function testExistValueMarca(Car $car1,Car $car2,Car $car3)
    {
        $cars = array($car1, $car2, $car3);
        $ok = false;

        foreach ($cars as $car) {
            if ($car->marca != null) {
                $ok = true;
            }
        }
        $ok == true ?$this->assertTrue( true ): $this->assertTrue(false);

    }
    /**
     * @dataProvider carProvider
     */

    public function testExistPropertyModelo(Car $car1,Car $car2,Car $car3){

        $cars = array($car1,$car2,$car3);
        $i=1;
        foreach($cars as $car) {
            $reflection[$i] = new \ReflectionClass($car);
            $ok = in_array('modelo',array_keys($reflection[$i]->getDefaultProperties()));
            $i++;
        }
        $ok == true ?$this->assertTrue( true ): $this->assertTrue(false);

    }


    /**
     * @depends testExistPropertyModelo
     * @dataProvider carProvider
     */

    public function testExistValueModelo(Car $car1,Car $car2,Car $car3)
    {
         $cars = array($car1, $car2, $car3);
            $ok = false;

        foreach ($cars as $car) {
            if ($car->modelo != null) {
                $ok = true;
            }
        }
        $ok == true ?$this->assertTrue( true ): $this->assertTrue(false);

    }

    /**
     * @dataProvider carProvider
     */

    public function testExistPropertyColor(Car $car1,Car $car2,Car $car3){

        $cars = array($car1,$car2,$car3);
        $i=1;
        foreach($cars as $car) {
            $reflection[$i] = new \ReflectionClass($car);
            $ok = in_array('color',array_keys($reflection[$i]->getDefaultProperties()));
            $i++;
        }
        $ok == true ?$this->assertTrue( true ): $this->assertTrue(false);

    }


    /**
     * @depends testExistPropertyColor
     * @dataProvider carProvider
     */

    public function testExistValueColor(Car $car1,Car $car2,Car $car3)
    {
        $cars = array($car1, $car2, $car3);
        $ok = false;

        foreach ($cars as $car) {
            if ($car->color != null) {
                $ok = true;
            }
        }
        $ok == true ?$this->assertTrue( true ): $this->assertTrue(false);

    }



    /**
     * @dataProvider carProvider
     */

    public function testExistPropertyllanta(Car $car1,Car $car2,Car $car3){

        $cars = array($car1,$car2,$car3);
        $i=1;
        foreach($cars as $car) {
            $reflection[$i] = new \ReflectionClass($car);
            $ok = in_array('llanta',array_keys($reflection[$i]->getDefaultProperties()));
            $i++;
        }
        $ok==true ?$this->assertTrue( true ): $this->assertTrue(false);
    }


    /**
     * @depends testExistPropertyllanta
     * @dataProvider carProvider
     */

    public function testExistValueLLanta(Car $car1,Car $car2,Car $car3)
    {
        $cars = array($car1, $car2, $car3);
        $ok = false;

        foreach ($cars as $car) {
            if ($car->llanta != null) {
                $ok = true;
            }
        }
        $ok == true ?$this->assertTrue( true ): $this->assertTrue(false);
    }


    public function carProvider()
    {

        $car1 = new Car();
        $car1->marca= 'Seat';
        $car1->modelo = 'Toledo';
        $car1->color = 'rojo';
        $car1->llanta = '10';

        $car2 = new Car();
        $car2->marca = 'Seat';
        $car2->modelo = 'Leon';
        $car2->color = 'azulk';
        $car2->llanta = '14';

        $car3 = new Car();
        $car3->marca = 'Seat';
        $car3->modelo = 'Leon';
        $car3->color = 'azulk';
        $car3->llanta = '14';

        return array(array($car1,$car2,$car3));
    }





}
