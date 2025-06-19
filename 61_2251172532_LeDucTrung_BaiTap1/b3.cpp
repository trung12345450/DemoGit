#include <iostream>
#include <memory>
#include <string>

using namespace std;

// Lớp cơ sở Order
class Order {
protected:
    string orderId;
    double totalAmount;
public:
    Order(string id, double amount) : orderId(id), totalAmount(amount) {}
    virtual void showInfo() const {
        cout << "Đơn hàng " << orderId << " có tổng tiền: " << totalAmount << endl;
    }
    string getOrderId() const { return orderId; }
    double getTotalAmount() const { return totalAmount; }
    virtual ~Order() = default;
};

// Lớp xử lý đơn hàng
class OrderProcessor {
public:
    void processOrder(const Order& order) {
        cout << "Đơn hàng " << order.getOrderId() << " đã được xử lý." << endl;
    }
};

// Lớp in đơn hàng
class OrderPrinter {
public:
    void printOrder(const Order& order) {
        order.showInfo();
    }
};

// Factory Method Pattern
class OrderFactory {
public:
    virtual unique_ptr<Order> createOrder(string orderId, double totalAmount) = 0;
    virtual ~OrderFactory() = default;
};

// Concrete Factory
class NormalOrderFactory : public OrderFactory {
public:
    unique_ptr<Order> createOrder(string orderId, double totalAmount) override {
        return make_unique<Order>(orderId, totalAmount);
    }
};

// Main
int main() {
    unique_ptr<OrderFactory> factory = make_unique<NormalOrderFactory>();
    auto order = factory->createOrder("DH001", 1500000);

    OrderProcessor processor;
    processor.processOrder(*order);

    OrderPrinter printer;
    printer.printOrder(*order);

    return 0;
}
