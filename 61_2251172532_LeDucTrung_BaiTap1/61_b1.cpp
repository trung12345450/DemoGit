// Lớp cha Vehicle
class Vehicle {
    private String brand;
    private int maxSpeed;

    // Constructor
    public Vehicle(String brand, int maxSpeed) {
        this.brand = brand;
        this.maxSpeed = maxSpeed;
    }

    // Getters
    public String getBrand() {
        return brand;
    }

    public int getMaxSpeed() {
        return maxSpeed;
    }

    // Phương thức hiển thị thông tin
    public void displayInfo() {
        System.out.println("Hãng: " + brand + ", Tốc độ tối đa: " + maxSpeed + " km/h");
    }
}

// Lớp con Car kế thừa từ Vehicle
class Car extends Vehicle {
    public Car(String brand, int maxSpeed) {
        super(brand, maxSpeed);
    }

    // Phương thức Honk()
    public void honk() {
        System.out.println("Xe hơi " + getBrand() + " bấm còi: Beep Beep!");
    }
}

// Lớp con Motorbike kế thừa từ Vehicle
class Motorbike extends Vehicle {
    public Motorbike(String brand, int maxSpeed) {
        super(brand, maxSpeed);
    }

    // Phương thức RevEngine()
    public void revEngine() {
        System.out.println("Xe máy " + getBrand() + " tăng ga: Vroom Vroom!");
    }
}

// Lớp chính để kiểm tra
public class Main {
    public static void main(String[] args) {
        // Tạo đối tượng Car
        Car car = new Car("Toyota", 180);
        car.displayInfo();
        car.honk();

        // Tạo đối tượng Motorbike
        Motorbike motorbike = new Motorbike("Honda", 120);
        motorbike.displayInfo();
        motorbike.revEngine();
    }
}