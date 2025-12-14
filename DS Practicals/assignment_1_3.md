# Assignment No: 1.3

## Title
Implement matrix multiplication and analyze its performance using row-major vs column-major order access patterns to understand how memory layout affects cache performance.

## Code

```cpp
#include<iostream>
using namespace std;

void row_major(int a[50][50], int b[50][50], int c[50][50], int n) {
    for(int i=0; i<n; i++) {
        for(int j=0; j<n; j++) {
            int sum=0;
            for(int k=0; k<n; k++) {
                sum += a[i][k] * b[k][j];
            }
            c[i][j] = sum;
        }
    }
}

void column_major(int a[50][50], int b[50][50], int c[50][50], int n) {
    // Note: This logic follows the pattern from the assignment PDF 
    // simulating column-wise access/operations
    for(int i=0; i<n; i++) {
        for(int j=0; j<n; j++) {
            int sum=0;
            for(int k=0; k<n; k++) {
                sum += a[k][i] * b[j][k];
            }
            c[i][j] = sum;
        }
    }
}

int main() {
    int n;
    cout << "Enter number of elements of matrix: ";
    cin >> n;
    
    int a[50][50], b[50][50], c[50][50];
    
    cout << "Enter elements of matrix 1: " << endl;
    for(int i=0; i<n; i++) {
        for(int j=0; j<n; j++) {
            cout << "Enter element: ";
            cin >> a[i][j];
        }
    }
    
    cout << "Enter elements of matrix 2: " << endl;
    for(int i=0; i<n; i++) {
        for(int j=0; j<n; j++) {
            cout << "Enter element: ";
            cin >> b[i][j];
        }
    }
    
    row_major(a, b, c, n);
    column_major(a, b, c, n);
    
    cout << "\nResult:" << endl;
    for(int i=0; i<n; i++) {
        for(int j=0; j<n; j++) {
            cout << c[i][j] << " ";
        }
    }
    
    cout << "\n\nRow major is fast because memory is accessed in order" << endl;
    cout << "Column major is slow because memory is accessed with jumps";
    
    return 0;
}
```

## Output

```text
Enter number of elements of matrix: 2
Enter elements of matrix 1:
Enter element: 1
Enter element: 2
Enter element: 3
Enter element: 4
Enter elements of matrix 2:
Enter element: 4
Enter element: 3
Enter element: 2
Enter element: 1

Result:
13 5 20 8 

Row major is fast because memory is accessed in order
Column major is slow because memory is accessed with jumps
```
