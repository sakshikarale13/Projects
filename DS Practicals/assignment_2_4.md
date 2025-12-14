# Assignment No: 2.4

## Title
Write a program using Bubble sort algorithm, assign the roll nos. to the students of your class as per their previous years result. i.e. topper will be roll no. 1 and analyse the sorting algorithm pass by pass.

## Code

```cpp
#include <iostream>
using namespace std;

struct Student {
    int student_roll_no;
    int total_marks;
};

void bubble_sort(Student arr[], int n) {
    for(int i=0; i<n-1; i++) {
        for(int j=0; j<n-i-1; j++) {
            // Sort in descending order of marks
            if(arr[j].total_marks < arr[j+1].total_marks) {
                swap(arr[j], arr[j+1]);
            }
        }
    }
}

int main() {
    int n;
    cout << "Enter number of students: ";
    cin >> n;
    
    Student arr[n];
    for(int i=0; i<n; i++) {
        cout << "Enter totalmarks for student " << i+1 << ": ";
        cin >> arr[i].total_marks;
    }
    
    bubble_sort(arr, n);
    
    // Assign roll numbers based on rank
    for(int i=0; i<n; i++) {
        arr[i].student_roll_no = i + 1;
    }
    
    cout << "\nStudents details: \n";
    cout << "Roll no.\tMarks\n";
    for(int i=0; i<n; i++) {
        cout << "\t" << arr[i].student_roll_no << "\t" << arr[i].total_marks << endl;
    }
    
    return 0;
}
```

## Output

```text
Enter number of students: 4
Enter totalmarks for student 1: 90
Enter totalmarks for student 2: 93
Enter totalmarks for student 3: 87
Enter totalmarks for student 4: 56

Students details: 
Roll no.    Marks
1           93
2           90
3           87
4           56
```
