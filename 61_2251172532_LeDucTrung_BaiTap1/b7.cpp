#include <iostream>
using namespace std;

// Implementor
class PaymentMethod {
public:
    virtual void pay() = 0;
    virtual ~PaymentMethod() = default;
};

// ConcreteImplementor A
class CreditCardPayment : public PaymentMethod {
public:
    void pay() override {
        cout << "Thanh toán bằng thẻ tín dụng." << endl;
    }
};

// ConcreteImplementor B
class PaypalPayment : public PaymentMethod {
public:
    void pay() override {
        cout << "Thanh toán bằng PayPal." << endl;
    }
};

// Abstraction
class Order {
protected:
    PaymentMethod* payment;
public:
    Order(PaymentMethod* method) : payment(method) {}
    virtual void processOrder() = 0;
    virtual ~Order() = default;
};

// RefinedAbstraction A
class OnlineOrder : public Order {
public:
    OnlineOrder(PaymentMethod* method) : Order(method) {}
    void processOrder() override {
        cout << "Xử lý đơn hàng online..." << endl;
        payment->pay();
    }
};

// RefinedAbstraction B
class InStoreOrder : public Order {
public:
    InStoreOrder(PaymentMethod* method) : Order(method) {}
    void processOrder() override {
        cout << "Xử lý đơn hàng tại cửa hàng..." << endl;
        payment->pay();
    }
};

int main() {
    CreditCardPayment creditCard;
    PaypalPayment paypal;

    OnlineOrder online(&creditCard);
    InStoreOrder inStore(&paypal);

    online.processOrder();
    inStore.processOrder();

    return 0;
}
