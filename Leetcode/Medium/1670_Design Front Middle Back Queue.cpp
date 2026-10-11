class FrontMiddleBackQueue 
{
    vector<int> q;
public:
    FrontMiddleBackQueue() 
    {
    }
    
    void pushFront(int val) 
    {
       q.insert(q.begin(),val); 
    }
    
    void pushMiddle(int val) 
    {
        q.insert(q.begin()+ q.size()/2, val);
    }
    
    void pushBack(int val) 
    {
        q.push_back(val);
    }
    
    int popFront() 
    {
        if(q.empty())
        {
            return -1;
        }
        int x = q.front();
        q.erase(q.begin());
        return x;
    }
    
    int popMiddle() 
    {
        if(q.empty())
        {
            return -1;
        }
        int i = (q.size()-1)/2;
        int x = q[i];
        q.erase(q.begin()+i);
        return x;
    }
    
    int popBack() 
    {
        if(q.empty())
        {
            return -1;
        }
        int x =q.back();
        q.pop_back();
        return x;
    }
};
