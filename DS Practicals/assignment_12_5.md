# Assignment No: 12.5

## Title
Design and implement a smart college placement portal that uses advanced hashing techniques to efficiently manage student placement records with high performance and low collision probability, even under dynamic data growth.

## Code

```cpp
#include <iostream>
#include <string>
using namespace std;

class PlacementPortal {
    struct Student {
        int roll;
        string name;
        string company;
        Student* next;
    };

    Student** table;
    int size;
    int count;

    // Advanced Hash Function
    int hashFunction(int key) {
        return key % size;
    }

    // Create Node
    Student* createNode(int roll, string name, string company) {
        Student* temp = new Student;
        temp->roll = roll;
        temp->name = name;
        temp->company = company;
        temp->next = NULL;
        return temp;
    }

    // Rehashing for Dynamic Growth
    void rehash() {
        int oldSize = size;
        Student** oldTable = table;

        size = size * 2;
        table = new Student*[size];

        for (int i = 0; i < size; i++) {
            table[i] = NULL;
        }

        count = 0; // Reset count and increment in insert

        for (int i = 0; i < oldSize; i++) {
            Student* ptr = oldTable[i];
            while (ptr != NULL) {
                // Re-insert into new table
                insert(ptr->roll, ptr->name, ptr->company);
                // Save next before deleting or moving
                Student* temp = ptr;
                ptr = ptr->next;
                delete temp; // Cleaning up old node, new node created in insert
            }
        }
        delete[] oldTable;
        cout << "\nRehashing Completed. New Table Size: " << size << "\n";
    }

public:
    PlacementPortal(int s = 10) {
        size = s;
        count = 0;
        table = new Student*[size];
        for (int i = 0; i < size; i++) {
            table[i] = NULL;
        }
    }

    // Insert Record
    void insert(int roll, string name, string company) {
        // Load factor check > 0.7
        if ((float)count / size > 0.7) {
            rehash();
        }

        int index = hashFunction(roll);
        Student* newNode = createNode(roll, name, company);

        newNode->next = table[index];
        table[index] = newNode;
        count++;
        
        // This cout is commented out during rehash to avoid spam
        // cout << "Student Placement Record Added Successfully!\n";
    }

    // Search Record
    void search(int roll) {
        int index = hashFunction(roll);
        Student* ptr = table[index];

        while (ptr != NULL) {
            if (ptr->roll == roll) {
                cout << "\nRecord Found:\n";
                cout << "Roll No: " << ptr->roll << endl;
                cout << "Name   : " << ptr->name << endl;
                cout << "Company: " << ptr->company << endl;
                return;
            }
            ptr = ptr->next;
        }
        cout << "\nRecord Not Found!\n";
    }

    // Delete Record
    void deleteRecord(int roll) {
        int index = hashFunction(roll);
        Student* ptr = table[index];
        Student* prev = NULL;

        while (ptr != NULL) {
            if (ptr->roll == roll) {
                if (prev == NULL) {
                    table[index] = ptr->next;
                } else {
                    prev->next = ptr->next;
                }
                delete ptr;
                count--;
                cout << "Record Deleted Successfully!\n";
                return;
            }
            prev = ptr;
            ptr = ptr->next;
        }
        cout << "Record Not Found!\n";
    }

    // Display All Records
    void display() {
        cout << "\n--- Placement Records ---\n";
        for (int i = 0; i < size; i++) {
            cout << i << " -> ";
            Student* ptr = table[i];
            while (ptr != NULL) {
                cout << "[" << ptr->roll << "|" << ptr->name << "|" << ptr->company << "] -> ";
                ptr = ptr->next;
            }
            cout << "NULL\n";
        }
    }
};

int main() {
    PlacementPortal portal;
    int choice, roll;
    string name, company;

    do {
        cout << "\n--- Smart Placement Portal ---\n";
        cout << "1. Add Placement Record\n";
        cout << "2. Search Record\n";
        cout << "3. Delete Record\n";
        cout << "4. Display All\n";
        cout << "5. Exit\n";
        cout << "Enter choice: ";
        cin >> choice;

        switch (choice) {
            case 1:
                cout << "Enter Roll No: ";
                cin >> roll;
                cout << "Enter Name: ";
                cin >> name;
                cout << "Enter Company: ";
                cin >> company;
                portal.insert(roll, name, company);
                cout << "Record Added.\n";
                break;
            case 2:
                cout << "Enter Roll No to Search: ";
                cin >> roll;
                portal.search(roll);
                break;
            case 3:
                cout << "Enter Roll No to Delete: ";
                cin >> roll;
                portal.deleteRecord(roll);
                break;
            case 4:
                portal.display();
                break;
        }
    } while (choice != 5);

    return 0;
}
```

## Output

```text
--- Smart Placement Portal ---
1. Add Placement Record
2. Search Record
3. Delete Record
4. Display All
5. Exit
Enter choice: 1
Enter Roll No: 34
Enter Name: Ram
Enter Company: Apple
Record Added.

Enter choice: 1
Enter Roll No: 13
Enter Name: Shyam
Enter Company: Google
Record Added.

Enter choice: 4
--- Placement Records ---
0 -> NULL
1 -> NULL
2 -> NULL
3 -> [13|Shyam|Google] -> NULL
4 -> [34|Ram|Apple] -> NULL
...
```
