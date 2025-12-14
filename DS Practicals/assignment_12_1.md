# Assignment No: 12.1

## Title
WAP to simulate a faculty database as a hash table. Search a particular faculty by using 'divide' as a hash function for linear probing with chaining without replacement method of collision handling technique. Assume suitable data for faculty record.

## Code

```cpp
#include <iostream>
#include <string>
using namespace std;

#define SIZE 10

// Faculty Node (Linked List)
struct Faculty {
    int id;
    string name;
    Faculty* next;
};

// Hash table (array of linked list heads)
Faculty* table[SIZE];

// Divide hash function
int hashFunction(int key) {
    return key % SIZE;
}

// Insert faculty (Chaining without replacement)
void insert(int id, string name) {
    int index = hashFunction(id);
    
    Faculty* newNode = new Faculty();
    newNode->id = id;
    newNode->name = name;
    newNode->next = NULL;

    // If slot is empty, place directly
    if (table[index] == NULL) {
        table[index] = newNode;
    } else {
        // Go to end of chain (no replacement of first node)
        Faculty* temp = table[index];
        while (temp->next != NULL) {
            temp = temp->next;
        }
        temp->next = newNode;
    }
}

// Search faculty
void search(int id) {
    int index = hashFunction(id);
    Faculty* temp = table[index];
    
    while (temp != NULL) {
        if (temp->id == id) {
            cout << "\nFaculty Found:";
            cout << "\nID   : " << temp->id;
            cout << "\nName : " << temp->name << endl;
            return;
        }
        temp = temp->next;
    }
    cout << "\nFaculty Not Found!" << endl;
}

// Display table
void display() {
    cout << "\nFaculty Hash Table: \n";
    for (int i = 0; i < SIZE; i++) {
        cout << i << " -> ";
        Faculty* temp = table[i];
        while (temp != NULL) {
            cout << "(" << temp->id << ", " << temp->name << ") -> ";
            temp = temp->next;
        }
        cout << "NULL" << endl;
    }
}

int main() {
    // Initialize table
    for (int i = 0; i < SIZE; i++) {
        table[i] = NULL;
    }

    // Sample data
    insert(21, "Sharma");
    insert(31, "Mehta");
    insert(41, "Rao");
    insert(52, "Khan");

    display();

    cout << "\nSearching Faculty ID 31:";
    search(31);

    return 0;
}
```

## Output

```text
Faculty Hash Table: 
0 -> NULL
1 -> (21, Sharma) -> (31, Mehta) -> (41, Rao) -> NULL
2 -> (52, Khan) -> NULL
3 -> NULL
4 -> NULL
5 -> NULL
6 -> NULL
7 -> NULL
8 -> NULL
9 -> NULL

Searching Faculty ID 31:
Faculty Found:
ID   : 31
Name : Mehta
```
