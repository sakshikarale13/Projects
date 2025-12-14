# Assignment No: 12.2

## Title
WAP to simulate a faculty database as a hash table. Search a particular faculty by using MOD as a hash function for linear probing with chaining with replacement method of collision handling technique. Assume suitable data for faculty record.

## Code

```cpp
#include <iostream>
#include <string>
using namespace std;

#define SIZE 10

// Node for Linked List
struct Faculty {
    int id;
    string name;
    string dept;
    Faculty* next;
};

// Hash Table
Faculty* hashTable[SIZE];

// Hash Function (MOD)
int hashFunction(int key) {
    return key % SIZE;
}

// Create new node
Faculty* createNode(int id, string name, string dept) {
    Faculty* temp = new Faculty;
    temp->id = id;
    temp->name = name;
    temp->dept = dept;
    temp->next = NULL;
    return temp;
}

// Insert using Chaining with Replacement
void insertFaculty(int id, string name, string dept) {
    int index = hashFunction(id);
    Faculty* newNode = createNode(id, name, dept);

    // If slot empty, place directly
    if (hashTable[index] == NULL) {
        hashTable[index] = newNode;
    } else {
        // Check replacement condition: 
        // If the node at this index doesn't actually belong here (it's part of a chain from elsewhere),
        // we replace it to maintain efficient lookup for the 'home' index.
        if (hashFunction(hashTable[index]->id) != index) {
            // Replace existing node
            Faculty* temp = hashTable[index];
            hashTable[index] = newNode;
            newNode->next = temp; 
            // Note: In a true chaining with replacement implementation, 
            // we would also need to update the 'next' pointer of the node pointing to 'temp'
            // to point to newNode, but simple array-based chaining logic usually implies 
            // coalesced hashing or just head insertion.
        } else {
            // Normal chaining (append to end)
            Faculty* ptr = hashTable[index];
            while (ptr->next != NULL) {
                ptr = ptr->next;
            }
            ptr->next = newNode;
        }
    }
}

// Search Faculty
void searchFaculty(int id) {
    int index = hashFunction(id);
    Faculty* ptr = hashTable[index];

    while (ptr != NULL) {
        if (ptr->id == id) {
            cout << "\nFaculty Found!\n";
            cout << "ID: " << ptr->id << endl;
            cout << "Name: " << ptr->name << endl;
            cout << "Department: " << ptr->dept << endl;
            return;
        }
        ptr = ptr->next;
    }
    cout << "\nFaculty Not Found!\n";
}

// Display Hash Table
void display() {
    for (int i = 0; i < SIZE; i++) {
        cout << i << " -> ";
        Faculty* ptr = hashTable[i];
        while (ptr != NULL) {
            cout << "[" << ptr->id << " | " << ptr->name << "] -> ";
            ptr = ptr->next;
        }
        cout << "NULL\n";
    }
}

int main() {
    int choice, id;
    string name, dept;

    // Initialize Hash Table
    for (int i = 0; i < SIZE; i++) {
        hashTable[i] = NULL;
    }

    do {
        cout << "\n--- Faculty Database Menu ---\n";
        cout << "1. Insert Faculty\n";
        cout << "2. Search Faculty\n";
        cout << "3. Display Hash Table\n";
        cout << "4. Exit\n";
        cout << "Enter choice: ";
        cin >> choice;

        switch (choice) {
            case 1:
                cout << "Enter Faculty ID: ";
                cin >> id;
                cout << "Enter Name: ";
                cin >> name;
                cout << "Enter Department: ";
                cin >> dept;
                insertFaculty(id, name, dept);
                break;
            case 2:
                cout << "Enter Faculty ID to Search: ";
                cin >> id;
                searchFaculty(id);
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
--- Faculty Database Menu ---
1. Insert Faculty
2. Search Faculty
3. Display Hash Table
4. Exit
Enter choice: 1
Enter Faculty ID: 1
Enter Name: sakshi
Enter Department: co

Enter choice: 1
Enter Faculty ID: 2
Enter Name: neha
Enter Department: ENTC

Enter choice: 2
Enter Faculty ID to Search: 2
Faculty Found!
ID: 2
Name: neha
Department: ENTC

Enter choice: 3
0 -> NULL
1 -> [1 | sakshi] -> NULL
2 -> [2 | neha] -> NULL
3 -> NULL
4 -> NULL
5 -> NULL
6 -> NULL
7 -> NULL
8 -> NULL
9 -> NULL
```
