package src.BT1;

public class Car extends BT1.Vehicle {
    public Car(String brand , int speed) {
        super(brand, speed);
    }

    public void Honk(){
        System.out.println("Bam coi");
    }

}
