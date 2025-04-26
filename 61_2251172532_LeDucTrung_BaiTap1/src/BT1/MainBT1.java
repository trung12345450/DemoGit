package src.BT1;

public class MainBT1 {
    public static void main(String[] args) {
        Car myCar = new Car("Vin" , 180);
        Motorbike myMotorbike = new Motorbike("Cup" , 80);

        System.out.println(myCar.toString());
        myCar.Honk();

        System.out.println(myMotorbike.toString());
        myMotorbike.RevEngine();
    }
}
