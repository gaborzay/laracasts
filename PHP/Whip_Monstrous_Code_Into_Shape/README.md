1. Consider Form Objects: A form object manages a single form in your application. It handles validation, potentially authorization, and finally - if you wish - persistence. In this lesson, we'll write an implementation from scratch, and then switch over to reviewing Laravel's form request classes and how they fit into the mix.
2. Consider Use Cases: A use case is nothing more than a description of how a user should interact with a particular part of your system. Traditionally, this description may be written on something as simple as an index card. However, what if we applied this approach to the code, itself? What might that look like?
3. Consider Domain Events: If it makes sense for your application, you might consider leveraging domain events and listeners to construct a complex set of functionality.
4. God Object Cleanup #1: Pass-Through: Any developer who has worked on the same project for a year or more will be well aware of the fact that, if you're not careful, your User class can quickly turn into a monstrous God object. In the next few videos, one tip at a time, we'll review techniques you might implement to clean things up. In this first example, we'll recognize related methods, and extract them to a dedicated object - which we then pass through to from our main User class.
5. God Object Cleanup #2: Traits and Socks: Let's review the next option you have, when cleaning up big, bad God objects: extracting traits. While some developers have knee-jerk reactions to the concept of a trait that will never be used elsewhere, I find it to be a clean and convenient solution. It's akin to cleaning up your room, by placing all the socks in one drawer, and the shirts in another. Admittedly, you didn't design a new closet space, but there's no denying that the room is now cleaner as a result.
6. God Object Cleanup #3: Value Objects: Extracting value objects, when appropriate, can be a useful technique for cleaning up messy classes. Use a simple metric: if you find multiple pieces of behavior that surround a single primitive or value, consider a value object. Please note that developers often have a tendency to "value object all the things," so be careful. Refactor toward value objects, rather than adopting them by default for every possible value.
7.
8.
9.
10.
11.
12.
13.
14.
15.
16.
17.
18.
19.
20.