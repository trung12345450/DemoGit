#include <iostream>
#include <string>
using namespace std;

// Lớp Order (client hiện tại)
class Order {
public:
    string id;
    string type;
    Order(string id, string type) : id(id), type(type) {}
};

// Giao diện xử lý đơn hàng
class OrderProcessor {
public:
    virtual void process(Order& order) = 0; // phải truyền tham chiếu & mới override đúng
    virtual ~OrderProcessor() {}
};

// Bộ xử lý đơn hàng hiện có
class NormalOrderProcessor : public OrderProcessor {
public:
    void process(Order& order) override {
        cout << "Processing Order: " << order.id << " of type: " << order.type << endl;
    }
};

// Lớp Service không tương thích (thư viện mới)
class ShippingService {
public:
    void shipItem(string orderCode) {
        cout << "Shipping item for order: " << orderCode << endl;
    }
};

// Adapter chuyển đổi ShippingService về OrderProcessor
class ShippingAdapter : public OrderProcessor {
private:
    ShippingService* shippingService;
public:
    ShippingAdapter(ShippingService* service) : shippingService(service) {}

    void process(Order& order) override {
        shippingService->shipItem(order.id);
    }
};

int main() {
    // Sử dụng hệ thống hiện tại
    Order normalOrder("A123", "normal");
    NormalOrderProcessor normalProcessor;
    normalProcessor.process(normalOrder);

    // Sử dụng thư viện mới qua adapter
    Order shipOrder("B456", "shipping");
    ShippingService shippingService;
    ShippingAdapter adapter(&shippingService);
    adapter.process(shipOrder);

    return 0;
}
