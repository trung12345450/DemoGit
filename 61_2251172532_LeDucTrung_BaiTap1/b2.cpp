#include <iostream>
#include <string>
using namespace std;

// Lớp Order: chỉ lưu trữ thông tin đơn hàng
class Order {
private:
    string orderId;
    double totalAmount;
public:
    Order(const string& id, double amount) : orderId(id), totalAmount(amount) {}

    string getOrderId() const {
        return orderId;
    }

    double getTotalAmount() const {
        return totalAmount;
    }
};

// Lớp OrderProcessor: chỉ xử lý đơn hàng
class OrderProcessor {
public:
    void processOrder(const Order& order) {
        cout << "Đơn hàng " << order.getOrderId() << " đã được xử lý." << endl;
    }
};

// Lớp OrderPrinter: chỉ in thông tin đơn hàng
class OrderPrinter {
public:
    void printOrder(const Order& order) {
        cout << "Đơn hàng " << order.getOrderId()
             << " có tổng tiền: " << order.getTotalAmount() << " VND" << endl;
    }
};

int main() {
    Order order("DH001", 500000.0);
    OrderProcessor processor;
    OrderPrinter printer;

    processor.processOrder(order);
    printer.printOrder(order);

    return 0;
}
