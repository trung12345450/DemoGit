// Lớp Order để quản lý thông tin đơn hàng
class Order {
    private String orderId;
    private double totalAmount;

    // Constructor
    public Order(String orderId, double totalAmount) {
        this.orderId = orderId;
        this.totalAmount = totalAmount;
    }

    // Getter cho orderId
    public String getOrderId() {
        return orderId;
    }

    // Getter cho totalAmount
    public double getTotalAmount() {
        return totalAmount;
    }
}

// Lớp OrderProcessor để xử lý đơn hàng
class OrderProcessor {
    public void processOrder(Order order) {
        System.out.println("Đơn hàng [" + order.getOrderId() + "] đã được xử lý.");
    }
}

// Lớp OrderPrinter để in thông tin đơn hàng
class OrderPrinter {
    public void printOrder(Order order) {
        System.out.println("Đơn hàng [" + order.getOrderId() + "] có tổng tiền: " + order.getTotalAmount());
    }
}

// Chương trình chính để kiểm tra tính năng
public class OrderManagement {
    public static void main(String[] args) {
        // Tạo một đơn hàng
        Order order = new Order("ORD123", 1500000.0);

        // Xử lý đơn hàng
        OrderProcessor processor = new OrderProcessor();
        processor.processOrder(order);

        // In thông tin đơn hàng
        OrderPrinter printer = new OrderPrinter();
        printer.printOrder(order);
    }
}