// Interface Order
interface Order {
    String getOrderId();
    double getTotalAmount();
    String getOrderType(); // Phương thức để lấy loại đơn hàng
}

// Lớp DomesticOrder triển khai Order
class DomesticOrder implements Order {
    private String orderId;
    private double totalAmount;

    public DomesticOrder(String orderId, double totalAmount) {
        this.orderId = orderId;
        this.totalAmount = totalAmount;
    }

    @Override
    public String getOrderId() {
        return orderId;
    }

    @Override
    public double getTotalAmount() {
        return totalAmount;
    }

    @Override
    public String getOrderType() {
        return "Domestic Order";
    }
}

// Lớp InternationalOrder triển khai Order
class InternationalOrder implements Order {
    private String orderId;
    private double totalAmount;

    public InternationalOrder(String orderId, double totalAmount) {
        this.orderId = orderId;
        this.totalAmount = totalAmount;
    }

    @Override
    public String getOrderId() {
        return orderId;
    }

    @Override
    public double getTotalAmount() {
        return totalAmount;
    }

    @Override
    public String getOrderType() {
        return "International Order";
    }
}

// Abstract Class OrderFactory (Creator)
abstract class OrderFactory {
    // Phương thức Factory Method
    abstract Order createOrder(String orderId, double totalAmount);
}

// Lớp DomesticOrderFactory triển khai OrderFactory
class DomesticOrderFactory extends OrderFactory {
    @Override
    Order createOrder(String orderId, double totalAmount) {
        return new DomesticOrder(orderId, totalAmount);
    }
}

// Lớp InternationalOrderFactory triển khai OrderFactory
class InternationalOrderFactory extends OrderFactory {
    @Override
    Order createOrder(String orderId, double totalAmount) {
        return new InternationalOrder(orderId, totalAmount);
    }
}

// Lớp OrderProcessor để xử lý đơn hàng
class OrderProcessor {
    public void processOrder(Order order) {
        System.out.println("Đơn hàng [" + order.getOrderId() + "] loại " + order.getOrderType() + " đã được xử lý.");
    }
}

// Lớp OrderPrinter để in thông tin đơn hàng
class OrderPrinter {
    public void printOrder(Order order) {
        System.out.println("Đơn hàng [" + order.getOrderId() + "] loại " + order.getOrderType() + " có tổng tiền: " + order.getTotalAmount());
    }
}

// Chương trình chính để kiểm tra
public class OrderManagement {
    public static void main(String[] args) {
        // Sử dụng Factory Method để tạo các loại đơn hàng
        OrderFactory domesticFactory = new DomesticOrderFactory();
        OrderFactory internationalFactory = new InternationalOrderFactory();

        // Tạo đơn hàng nội địa
        Order domesticOrder = domesticFactory.createOrder("ORD123", 1500000.0);
        // Tạo đơn hàng quốc tế
        Order internationalOrder = internationalFactory.createOrder("ORD456", 3000000.0);

        // Xử lý và in thông tin đơn hàng
        OrderProcessor processor = new OrderProcessor();
        OrderPrinter printer = new OrderPrinter();

        // Xử lý và in đơn hàng nội địa
        processor.processOrder(domesticOrder);
        printer.printOrder(domesticOrder);

        // Xử lý và in đơn hàng quốc tế
        processor.processOrder(internationalOrder);
        printer.printOrder(internationalOrder);
    }
}