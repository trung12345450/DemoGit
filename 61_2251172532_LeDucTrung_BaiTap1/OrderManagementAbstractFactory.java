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

// Abstract Order Processor
interface AbstractOrderProcessor {
    String processOrder(Order order);
}

// Lớp OrderProcessor để xử lý đơn hàng
class OrderProcessor implements AbstractOrderProcessor {
    public String processOrder(Order order) {
        if (order.getTotalAmount() > 0) {
            return "Đơn hàng [" + order.getOrderId() + "] đã được xử lý.";
        }
        return "Đơn hàng [" + order.getOrderId() + "] không hợp lệ: TotalAmount phải lớn hơn 0.";
    }
}

// Abstract Order Printer
interface AbstractOrderPrinter {
    void printOrder(Order order);
}

// Lớp OrderPrinter để in thông tin đơn hàng
class OrderPrinter implements AbstractOrderPrinter {
    public void printOrder(Order order) {
        if (order.getTotalAmount() > 0) {
            System.out.println("Đơn hàng [" + order.getOrderId() + "] có tổng tiền: " + order.getTotalAmount());
        } else {
            System.out.println("Không thể in: Đơn hàng [" + order.getOrderId() + "] không hợp lệ.");
        }
    }
}

// Abstract Factory
interface AbstractFactory {
    AbstractOrderProcessor createOrderProcessor();
    AbstractOrderPrinter createOrderPrinter();
}

// Concrete Factory
class OrderFactory implements AbstractFactory {
    public AbstractOrderProcessor createOrderProcessor() {
        return new OrderProcessor();
    }

    public AbstractOrderPrinter createOrderPrinter() {
        return new OrderPrinter();
    }
}

// Chương trình chính để kiểm tra tính năng
public class OrderManagementAbstractFactory {
    public static void main(String[] args) {
        // Tạo một đơn hàng
        Order order = new Order("ORD123", 1500000.0);

        // Sử dụng Factory
        AbstractFactory factory = new OrderFactory();
        AbstractOrderProcessor processor = factory.createOrderProcessor();
        AbstractOrderPrinter printer = factory.createOrderPrinter();

        // Xử lý và in đơn hàng
        String status = processor.processOrder(order);
        System.out.println(status);
        printer.printOrder(order);

        // Kiểm tra với đơn hàng không hợp lệ
        Order invalidOrder = new Order("ORD124", 0.0);
        String invalidStatus = processor.processOrder(invalidOrder);
        System.out.println(invalidStatus);
        printer.printOrder(invalidOrder);
    }
}