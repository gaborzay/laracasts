1.  No Abbreviations: Let's begin with a simple rule: avoid abbreviations. Nearly all beginning developers break this one at some point or another. 
2.  Don't Use "Else": Is it possible that the else condition within that method of yours is either unnecessary or redundant? I bet the answer is yes! If so, get it out of there!
3.  One Level of Indentation: I know what you're thinking. One level of indentation? That's impossible! Well, are you sure about that? Maybe there are lots of instances, when we can improve the design of our code by adhering to this guideline.
4.  Limit Your Instance Variables: As we work in PHP, we'll need to tweak this next guideline a bit. Jeff Bay, the creator of these exercises, recommends that, at most, your classes should contain two instance variables. Let's talk about that a bit!
5.  Wrap Primitives (Sometimes): The next guideline instructs us to always wrap primitives (things like strings and integers). However, I'm going to caution you on this one. You must first consider the complexity of your app, and the benefits that each wrapper provides.
    1. Does it bring clarity?
    2. Is there behavior? If yes, maybe value object?
    3. Consistency.
    4. Important domain concept?