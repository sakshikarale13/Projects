# Assignment No: 12.3

## Title
WAP to simulate employee databases as a hash table. Search a particular faculty by using Mid square method as a hash function for linear probing method of collision handling technique. Assume suitable data for faculty record.

## Code

```cpp
#include <iostream>
#include <string>
using namespace std;

#define SIZE 10

// Linked List Node
struct Employee {
    int id;
    string name;
    string dept;
    // Note: 'next' is unused in linear probing, but struct kept from PDF
    Employee* next; 
};

// Hash Table (Array of pointers to Employee objects)
Employee* hashTable[SIZE];

// Mid-Square Hash Function
int midSquareHash(int key) {
    long long square = (long long)key * key;
    // Extract middle digit: square / 10 then % SIZE (assuming SIZE=10)
    int mid = (square / 10) % SIZE; 
    return mid;
}

// Create new node
Employee* createNode(int id, string name, string dept) {
    Employee* temp = new Employee;
    temp->id = id;
    temp->name = name;
    temp->dept = dept;
    temp->next = NULL;
    return temp;
}

// Insert using Linear Probing
void insertEmployee(int id, string name, string dept) {
    int index = midSquareHash(id);
    int originalIndex = index;

    // Linear probing if collision
    while (hashTable[index] != NULL) {
        index = (index + 1) % SIZE;
        if (index == originalIndex) {
            cout << "Hash Table Full!\n";
            return;
        }
    }
    hashTable[index] = createNode(id, name, dept);
}

// Search Employee
void searchEmployee(int id) {
    int index = midSquareHash(id);
    int startIndex = index;

    while (hashTable[index] != NULL) {
        if (hashTable[index]->id == id) {
            cout << "\nEmployee Found!\n";
            cout << "ID: " << hashTable[index]->id << endl;
            cout << "Name: " << hashTable[index]->name << endl;
            cout << "Department: " << hashTable[index]->dept << endl;
            return;
        }
        
        index = (index + 1) % SIZE;
        if (index == startIndex) {
            break;
        }
    }
    cout << "\nEmployee Not Found!\n";
}

// Display Hash Table
void display() {
    cout << "\nHash Table: \n";
    for (int i = 0; i < SIZE; i++) {
        cout << i << " -> ";
        if (hashTable[i] != NULL) {
            cout << hashTable[i]->id << " | "
                 << hashTable[i]->name << " | "
                 << hashTable[i]->dept;
        }
        cout << endl;
    }
}

int main() {
    int choice, id;
    string name, dept;

    for (int i = 0; i < SIZE; i++) {
        hashTable[i] = NULL;
    }

    do {
        cout << "\n--- Employee Database Menu ---\n";
        cout << "1. Insert Employee\n";
        cout << "2. Search Employee\n";
        cout << "3. Display Hash Table\n";
        cout << "4. Exit\n";
        cout << "Enter choice: ";
        cin >> choice;

        switch (choice) {
            case 1:
                cout << "Enter Employee ID: ";
                cin >> id;
                cout << "Enter Name: ";
                cin >> name;
                cout << "Enter Department: ";
                cin >> dept;
                insertEmployee(id, name, dept);
                break;
            case 2:
                cout << "Enter Employee ID to Search: ";
                cin >> id;
                searchEmployee(id);
                break;
            case 3:
                display();
                break;
        }
    } while (choice != 4);

    return 0;
}
```

## Output

```text
--- Employee Database Menu ---
1. Insert Employee
2. Search Employee
3. Display Hash Table
4. Exit
Enter choice: 1
Enter Employee ID: 1
Enter Name: Ram
Enter Department: CO

Enter choice: 1
Enter Employee ID: 2
Enter Name: Shyam
Enter Department: CM

Enter choice: 3
Hash Table: 
0 -> 1 | Ram | CO
1 -> 2 | Shyam | CM
2 -> 
3 -> 
4 -> 
5 -> 
6 -> 
7 -> 
8 -> 
9 -> 
```
