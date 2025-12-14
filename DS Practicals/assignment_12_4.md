# Assignment No: 12.4

## Title
WAP to simulate student databases as a hash table. a student database management system using hashing techniques to allow efficient insertion, search, and deletion of student records.

## Code

```cpp
#include <iostream>
#include <string>
using namespace std;

#define SIZE 10

// Node structure for Linked List
struct Student {
    int roll;
    string name;
    string course;
    Student* next;
};

// Hash Table
Student* hashTable[SIZE];

// Hash Function (MOD)
int hashFunction(int key) {
    return key % SIZE;
}

// Create new node
Student* createNode(int roll, string name, string course) {
    Student* temp = new Student;
    temp->roll = roll;
    temp->name = name;
    temp->course = course;
    temp->next = NULL;
    return temp;
}

// Insert Student
void insertStudent(int roll, string name, string course) {
    int index = hashFunction(roll);
    Student* newNode = createNode(roll, name, course);

    if (hashTable[index] == NULL) {
        hashTable[index] = newNode;
    } else {
        Student* ptr = hashTable[index];
        while (ptr->next != NULL) {
            ptr = ptr->next;
        }
        ptr->next = newNode;
    }
    cout << "\nStudent Inserted Successfully!\n";
}

// Search Student
void searchStudent(int roll) {
    int index = hashFunction(roll);
    Student* ptr = hashTable[index];

    while (ptr != NULL) {
        if (ptr->roll == roll) {
            cout << "\nStudent Found!\n";
            cout << "Roll No: " << ptr->roll << endl;
            cout << "Name: " << ptr->name << endl;
            cout << "Course: " << ptr->course << endl;
            return;
        }
        ptr = ptr->next;
    }
    cout << "\nStudent Not Found!\n";
}

// Delete Student
void deleteStudent(int roll) {
    int index = hashFunction(roll);
    Student* ptr = hashTable[index];
    Student* prev = NULL;

    while (ptr != NULL) {
        if (ptr->roll == roll) {
            if (prev == NULL) {
                hashTable[index] = ptr->next;
            } else {
                prev->next = ptr->next;
            }
            delete ptr;
            cout << "\nStudent Record Deleted Successfully!\n";
            return;
        }
        prev = ptr;
        ptr = ptr->next;
    }
    cout << "\nStudent Not Found!\n";
}

// Display Hash Table
void display() {
    cout << "\n--- Student Hash Table ---\n";
    for (int i = 0; i < SIZE; i++) {
        cout << i << " -> ";
        Student* ptr = hashTable[i];
        while (ptr != NULL) {
            cout << "[" << ptr->roll << "," << ptr->name << "] -> ";
            ptr = ptr->next;
        }
        cout << "NULL\n";
    }
}

int main() {
    int choice, roll;
    string name, course;

    for (int i = 0; i < SIZE; i++) {
        hashTable[i] = NULL;
    }

    do {
        cout << "\n--- Student Database Menu ---\n";
        cout << "1. Insert Student\n";
        cout << "2. Search Student\n";
        cout << "3. Delete Student\n";
        cout << "4. Display Hash Table\n";
        cout << "5. Exit\n";
        cout << "Enter your choice: ";
        cin >> choice;

        switch (choice) {
            case 1:
                cout << "Enter Roll No: ";
                cin >> roll;
                cout << "Enter Name: ";
                cin >> name;
                cout << "Enter Course: ";
                cin >> course;
                insertStudent(roll, name, course);
                break;
            case 2:
                cout << "Enter Roll No to Search: ";
                cin >> roll;
                searchStudent(roll);
                break;
            case 3:
                cout << "Enter Roll No to Delete: ";
                cin >> roll;
                deleteStudent(roll);
                break;
            case 4:
                display();
                break;
        }
    } while (choice != 5);

    return 0;
}
```

## Output

```text
Student Database Menu
1. Insert Student
2. Search Student
3. Delete Student
4. Display Hash Table
5. Exit
Enter your choice: 1
Enter Roll No: 1
Enter Name: sakshi
Enter Course: co
Student Inserted Successfully!

Enter your choice: 1
Enter Roll No: 2
Enter Name: John
Enter Course: Ai
Student Inserted Successfully!

Enter your choice: 4
--- Student Hash Table ---
0 -> NULL
1 -> [1,sakshi] -> NULL
2 -> [2,John] -> NULL
...
```
