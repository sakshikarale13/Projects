# Assignment No: 9.5

## Title
Write a Program to accept a graph from a user and represent it with Adjacency List and perform BFS and DFS traversals on it.

## Code

```cpp
#include <iostream>
#include <queue>
using namespace std;

struct Node {
    int vertex;
    Node* next;
};

class Graph {
    int V;
    Node* adjList[20];
    bool visited[20];

public:
    Graph(int v) {
        V = v;
        for (int i = 0; i < V; i++) {
            adjList[i] = NULL;
            visited[i] = false;
        }
    }

    void addEdge(int src, int dest) {
        Node* newNode = new Node();
        newNode->vertex = dest;
        newNode->next = adjList[src];
        adjList[src] = newNode;

        newNode = new Node();
        newNode->vertex = src;
        newNode->next = adjList[dest];
        adjList[dest] = newNode;
    }

    void BFS(int start) {
        queue<int> q;
        for (int i = 0; i < V; i++) {
            visited[i] = false;
        }

        visited[start] = true;
        q.push(start);

        cout << "\nBFS Traversal: ";

        while (!q.empty()) {
            int current = q.front();
            q.pop();
            cout << current << " ";

            Node* temp = adjList[current];
            while (temp != NULL) {
                if (!visited[temp->vertex]) {
                    visited[temp->vertex] = true;
                    q.push(temp->vertex);
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
            if (!visited[temp->vertex]) {
                DFSUtil(temp->vertex);
            }
            temp = temp->next;
        }
    }

    void DFS(int start) {
        for (int i = 0; i < V; i++) {
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

    cout << "Enter starting vertex: ";
    cin >> start;

    g.BFS(start);
    g.DFS(start);

    return 0;
}
```

## Output

```text
Enter number of vertices: 5
Enter number of edges: 4
Enter edge (source destination): 0 1
Enter edge (source destination): 0 2
Enter edge (source destination): 1 3
Enter edge (source destination): 2 4
Enter starting vertex: 0

BFS Traversal: 0 2 1 4 3 
DFS Traversal: 0 2 4 1 3 
```
