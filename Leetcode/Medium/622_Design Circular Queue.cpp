class MyCircularQueue {
public:
    int front, rear,cap,currSize;
    vector<int> arr;
    MyCircularQueue(int k) 
    {  
            cap=k;
            front=0;
            rear=-1;
            arr.resize(cap);
            currSize =0;
    }
    
    bool enQueue(int value) 
    {
        if(isFull())
        {
            cout<<"Queue is Full";
            return false;
        }
        rear =(rear+1)%cap;
        arr[rear]=value;
        currSize++;
        return true;
    }
    
    bool deQueue() 
    {
        if(isEmpty())
        {
            cout<<"Queue is Empty";
            return false;
        }
        front = (front+1)%cap;
        currSize--;
        return true;
    }
    
    int Front() 
    {
        if(isEmpty())
        {
            return -1;
        }
        return arr[front];
    }
    
    int Rear() 
    {
        if(isEmpty())
        {
            return -1;
        }
        return arr[rear];
    }
    
    bool isEmpty() 
    {
        return currSize==0;
    }
    
    bool isFull() 
    {
        return currSize==cap;
    }
};
