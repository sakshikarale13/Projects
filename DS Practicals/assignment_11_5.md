# Assignment No: 11.5

## Title
WAP to simulate a faculty database as a hash table. Search a particular faculty by using MOD as a hash function for linear probing method of collision handling technique. Assume suitable data for faculty record.

## Code

```cpp
#include <iostream>
#include <string>
using namespace std;

#define SIZE 10

// Faculty Record Node
struct Faculty {
    int id;
    string name;
};

// Hash table (array of pointers)
Faculty* table[SIZE];

// Hash Function using MOD
int hashFunction(int key) {
    return key % SIZE;
}

// Insert Faculty Record using Linear Probing
void insert(int id, string name) {
    int index = hashFunction(id);
    int start = index;

    // Linear Probing if collision occurs
    while(table[index] != NULL) {
        index = (index + 1) % SIZE;
        if(index == start) {
            cout << "Hash table is full!" << endl;
            return;
        }
    }

    table[index] = new Faculty();
    table[index]->id = id;
    table[index]->name = name;
}

// Search Faculty by ID
void search(int id) {
    int index = hashFunction(id);
    int start = index;

    while(table[index] != NULL) {
        if(table[index]->id == id) {
            cout << "\nFaculty Found:";
            cout << "\nID   : " << table[index]->id;
            cout << "\nName : " << table[index]->name << endl;
            return;
        }
        
        index = (index + 1) % SIZE;
        
        // If we loop back to start, we didn't find it
        if(index == start) {
            break;
        }
    }
    cout << "\nFaculty Record Not Found!" << endl;
}

// Display Hash Table
void display() {
    cout << "\nFaculty Hash Table: \n";
    for(int i = 0; i < SIZE; i++) {
        if(table[i] != NULL)
            cout << i << " -> " << table[i]->id << ", " << table[i]->name << endl;
        else
            cout << i << " -> NULL" << endl;
    }
}

int main() {
    // Initialize table
    for(int i = 0; i < SIZE; i++) {
        table[i] = NULL;
    }

    // Insert sample data
    insert(101, "Dr.Sharma");
    insert(112, "Prof.Mehta");
    insert(123, "Dr.Khan");
    insert(134, "Prof.Rao");

    display();

    cout << "\nSearching Faculty ID 123:";
    search(123);

    return 0;
}
```

## Output

```text
Faculty Hash Table: 
0 -> NULL
1 -> 101, Dr.Sharma
2 -> 112, Prof.Mehta
3 -> 123, Dr.Khan
4 -> 134, Prof.Rao
5 -> NULL
6 -> NULL
7 -> NULL
8 -> NULL
9 -> NULL

Searching Faculty ID 123:
Faculty Found:
ID   : 123
Name : Dr.Khan
```
