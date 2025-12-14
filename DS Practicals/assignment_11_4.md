# Assignment No: 11.4

## Title
Store and retrieve student records using roll numbers.

## Code

```cpp
#include <iostream>
#include <string>
using namespace std;

#define SIZE 10

// Structure for Student
struct Student {
    int roll;
    string name;
    Student* next;
};

// Hash table
Student* table[SIZE];

// Hash function
int hashFunction(int roll) {
    return roll % SIZE;
}

// Insert student record
void insertStudent(int roll, string name) {
    int index = hashFunction(roll);
    
    Student* newNode = new Student();
    newNode->roll = roll;
    newNode->name = name;
    newNode->next = table[index]; // Separate chaining insert at head
    table[index] = newNode;
}

// Search student by roll number
void searchStudent(int roll) {
    int index = hashFunction(roll);
    Student* temp = table[index];
    
    while(temp != NULL) {
        if(temp->roll == roll) {
            cout << "\nStudent Found:";
            cout << "\nRoll No: " << temp->roll;
            cout << "\nName   : " << temp->name << endl;
            return;
        }
        temp = temp->next;
    }
    cout << "\nStudent Record Not Found!" << endl;
}

// Display all records
void displayAll() {
    cout << "\nStudent Records: \n";
    for(int i = 0; i < SIZE; i++) {
        Student* temp = table[i];
        while(temp != NULL) {
            cout << "Roll: " << temp->roll << " Name: " << temp->name << endl;
            temp = temp->next;
        }
    }
}

int main() {
    int choice, roll;
    string name;

    // Initialize table
    for(int i = 0; i < SIZE; i++) {
        table[i] = NULL;
    }

    do {
        cout << "\n1. Insert Student";
        cout << "\n2. Search Student";
        cout << "\n3. Display All";
        cout << "\n4. Exit";
        cout << "\nEnter choice: ";
        cin >> choice;

        switch(choice) {
            case 1:
                cout << "Enter Roll Number: ";
                cin >> roll;
                cout << "Enter Name: ";
                cin >> name;
                insertStudent(roll, name);
                break;
            case 2:
                cout << "Enter Roll Number to search: ";
                cin >> roll;
                searchStudent(roll);
                break;
            case 3:
                displayAll();
                break;
        }
    } while(choice != 4);

    return 0;
}
```

## Output

```text
1. Insert Student
2. Search Student
3. Display All
4. Exit
Enter choice: 1
Enter Roll Number: 34
Enter Name: Sakshi

1. Insert Student
2. Search Student
3. Display All
4. Exit
Enter choice: 1
Enter Roll Number: 13
Enter Name: neha

1. Insert Student
2. Search Student
3. Display All
4. Exit
Enter choice: 2
Enter Roll Number to search: 34

Student Found:
Roll No: 34
Name   : Sakshi

1. Insert Student
2. Search Student
3. Display All
4. Exit
Enter choice: 3

Student Records: 
Roll: 13 Name: neha
Roll: 34 Name: Sakshi
```
