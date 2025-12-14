# Assignment No: 9.1

## Title
Write a Program to accept a graph from a user and represent it with Adjacency Matrix and perform BFS and DFS traversals on it.

## Code

```cpp
#include <iostream>
#include <queue>
using namespace std;

struct Node {
    int data;
    Node* next;
};

class Graph {
    int vertices;
    int adjMatrix[20][20];
    Node* adjList[20]; // Keeping for hybrid structure if needed, though mostly Matrix used here
    bool visited[20];

public:
    Graph(int v) {
        vertices = v;
        for (int i = 0; i < vertices; i++) {
            adjList[i] = NULL;
            visited[i] = false;
            for (int j = 0; j < vertices; j++) {
                adjMatrix[i][j] = 0;
            }
        }
    }

    void addEdge(int src, int dest) {
        // Adjacency Matrix
        adjMatrix[src][dest] = 1;
        adjMatrix[dest][src] = 1;

        // Adjacency List (Linked List) - syncing both representations
        Node* newNode = new Node();
        newNode->data = dest;
        newNode->next = adjList[src];
        adjList[src] = newNode;

        newNode = new Node();
        newNode->data = src;
        newNode->next = adjList[dest];
        adjList[dest] = newNode;
    }

    void displayMatrix() {
        cout << "\nAdjacency Matrix:\n";
        for (int i = 0; i < vertices; i++) {
            for (int j = 0; j < vertices; j++) {
                cout << adjMatrix[i][j] << " ";
            }
            cout << endl;
        }
    }

    void BFS(int start) {
        for (int i = 0; i < vertices; i++) {
            visited[i] = false;
        }

        queue<int> q;
        q.push(start);
        visited[start] = true;

        cout << "\nBFS Traversal: ";

        while (!q.empty()) {
            int current = q.front();
            q.pop();
            cout << current << " ";

            // Using Adjacency List for traversal efficiency
            Node* temp = adjList[current];
            while (temp != NULL) {
                if (!visited[temp->data]) {
                    visited[temp->data] = true;
                    q.push(temp->data);
                }
                temp = temp->next;
            }
        }
        cout << endl;
    }

    void DFSUtil(int v) {
        visited[v] = true;
        cout << v << " ";

        Node* temp = adjList[v];
        while (temp != NULL) {
            if (!visited[temp->data]) {
                DFSUtil(temp->data);
            }
            temp = temp->next;
        }
    }

    void DFS(int start) {
        for (int i = 0; i < vertices; i++) {
            visited[i] = false;
        }
        cout << "\nDFS Traversal: ";
        DFSUtil(start);
        cout << endl;
    }
};

int main() {
    int v, e, src, dest, start;

    cout << "Enter number of vertices: ";
    cin >> v;

    Graph g(v);

    cout << "Enter number of edges: ";
    cin >> e;

    for (int i = 0; i < e; i++) {
        cout << "Enter edge (source destination): ";
        cin >> src >> dest;
        g.addEdge(src, dest);
    }

    g.displayMatrix();

    cout << "\nEnter starting vertex for BFS and DFS: ";
    cin >> start;

    g.BFS(start);
    g.DFS(start);

    return 0;
}
```

## Output

```text
Enter number of vertices: 4
Enter number of edges: 3
Enter edge (source destination): 1 3
Enter edge (source destination): 3 2
Enter edge (source destination): 1 2

Adjacency Matrix:
0 0 0 0 
0 0 1 1 
0 1 0 1 
0 1 1 0 

Enter starting vertex for BFS and DFS: 3

BFS Traversal: 3 2 1 
DFS Traversal: 3 2 1 
```
