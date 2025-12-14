# Assignment No: 6.5

## Title
In a call center, customer calls are handled on a first-come, first-served basis. Implement a queue system using Linked list where:
• Each customer call is enqueued as it arrives.
• Customer service agents dequeue calls to assist customers.
If there are no calls, the system waits.

## Code

```cpp
#include <iostream>
#include <string>
using namespace std;

struct Node {
    string callName;
    Node* next;
};

Node* frontPtr = NULL;
Node* rearPtr = NULL;

// Add a customer call
void enqueue(string name) {
    Node* n = new Node;
    n->callName = name;
    n->next = NULL;
    
    if (rearPtr == NULL) {
        frontPtr = rearPtr = n;
    } else {
        rearPtr->next = n;
        rearPtr = n;
    }
    cout << "Call from " << name << " added to the queue.\n";
}

// Remove a customer call
void dequeue() {
    if (frontPtr == NULL) {
        cout << "No calls in the queue.\n";
        return;
    }
    Node* temp = frontPtr;
    cout << "Serving call of: " << frontPtr->callName << endl;
    frontPtr = frontPtr->next;
    
    if (frontPtr == NULL)
        rearPtr = NULL;
        
    delete temp;
}

// Display all calls waiting in queue
void display() {
    if (frontPtr == NULL) {
        cout << "No calls in the queue.\n";
        return;
    }
    cout << "Calls waiting in queue:\n";
    Node* temp = frontPtr;
    while (temp != NULL) {
        cout << "- " << temp->callName << endl;
        temp = temp->next;
    }
}

int main() {
    int choice;
    string name;
    
    do {
        cout << "\n--- Call Center Queue Menu ---\n";
        cout << "1. Add Customer Call (Enqueue)\n";
        cout << "2. Serve Next Call (Dequeue)\n";
        cout << "3. Display All Calls\n";
        cout << "4. Exit\n";
        cout << "Enter your choice: ";
        cin >> choice;
        
        switch (choice) {
            case 1:
                cout << "Enter customer name: ";
                cin >> name;
                enqueue(name);
                break;
            case 2:
                dequeue();
                break;
            case 3:
                display();
                break;
            case 4:
                cout << "Exiting...\n";
                break;
            default:
                cout << "Invalid choice.\n";
        }
    } while (choice != 4);
    
    return 0;
}
```

## Output

```text
Call Center Queue Menu
1. Add Customer Call (Enqueue)
2. Serve Next Call (Dequeue)
3. Display All Calls
4. Exit
Enter your choice: 1
Enter customer name: Karan
Call from Karan added to the queue.

Enter your choice: 2
Serving call of: Karan
```
