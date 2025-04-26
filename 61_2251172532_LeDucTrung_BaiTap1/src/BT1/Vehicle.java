package BT1;

public class Vehicle {
    private String Brand;
    private int MaxSpeed;

    public Vehicle(String brand, int maxSpeed) {
        Brand = brand;
        MaxSpeed = maxSpeed;
    }

    public String getBrand() {
        return Brand;
    }

    public void setBrand(String brand) {
        Brand = brand;
    }

    public int getMaxSpeed() {
        return MaxSpeed;
    }

    public void setMaxSpeed(int maxSpeed) {
        MaxSpeed = maxSpeed;
    }

    public String toString() {
        return "Brand: " + Brand + ", MaxSpeed: " + MaxSpeed;
    }
}