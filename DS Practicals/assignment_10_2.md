# Assignment No: 10.2

## Title
Write a Program to implement Dijkstra's algorithm to find shortest distance between two nodes of a user defined graph. Use Adjacency Matrix to represent a graph.

## Code

```cpp
#include <iostream>
#include <climits>
using namespace std;

#define MAX 10

// Linked List Node to store path
struct Node {
    int data;
    Node* next;
};

// Function to add node at end of linked list
void insert(Node* &head, int value) {
    Node* newNode = new Node();
    newNode->data = value;
    newNode->next = NULL;

    if(head == NULL) {
        head = newNode;
    } else {
        Node* temp = head;
        while(temp->next != NULL)
            temp = temp->next;
        temp->next = newNode;
    }
}

// Function to print linked list
void display(Node* head) {
    while(head != NULL) {
        cout << head->data << " ";
        head = head->next;
    }
    cout << endl;
}

// Dijkstra Algorithm
void dijkstra(int graph[MAX][MAX], int n, int src, int dest) {
    int dist[MAX], visited[MAX], parent[MAX];

    for(int i = 0; i < n; i++) {
        dist[i] = INT_MAX;
        visited[i] = 0;
        parent[i] = -1;
    }

    dist[src] = 0;

    for(int count = 0; count < n - 1; count++) {
        int min = INT_MAX, u;

        for(int i = 0; i < n; i++) {
            if(!visited[i] && dist[i] <= min) {
                min = dist[i];
                u = i;
            }
        }

        visited[u] = 1;

        for(int v = 0; v < n; v++) {
            if(!visited[v] && graph[u][v] && dist[u] != INT_MAX && 
               dist[u] + graph[u][v] < dist[v]) {
                dist[v] = dist[u] + graph[u][v];
                parent[v] = u;
            }
        }
    }

    cout << "\nShortest Distance from " << src << " to " << dest << " = " << dist[dest] << endl;

    // Store path in linked list
    Node* path = NULL;
    int temp = dest;
    
    // Check if path exists
    if (dist[dest] == INT_MAX) {
        cout << "No path exists.\n";
        return;
    }

    while(temp != -1) {
        insert(path, temp);
        temp = parent[temp];
    }

    cout << "Path (in reverse using linked list): ";
    display(path);
}

int main() {
    int graph[MAX][MAX], n, src, dest;

    cout << "Enter number of vertices: ";
    cin >> n;

    cout << "Enter Adjacency Matrix: \n";
    for(int i = 0; i < n; i++) {
        for(int j = 0; j < n; j++) {
            cin >> graph[i][j];
        }
    }

    cout << "Enter source node: ";
    cin >> src;
    cout << "Enter destination node: ";
    cin >> dest;

    dijkstra(graph, n, src, dest);

    return 0;
}
```

## Output

```text
Enter number of vertices: 5
Enter Adjacency Matrix: 
0 10 0 30 100
10 0 50 0 0
0 50 0 20 10
30 0 20 0 60
100 0 10 60 0
Enter source node: 0
Enter destination node: 4

Shortest Distance from 0 to 4 = 60
Path (in reverse using linked list): 4 2 3 0 
```
