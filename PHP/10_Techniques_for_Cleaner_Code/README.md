1.  Refactoring Insurance
    Technique #1. You can't improve your code if you're terrified to change it. That's where tests come into play. Think of them as refactoring insurance. Go ahead, make as many tweaks as you need to. Each step of the way, your tests will let you know if you've made a mistake.
    
2.  Play With Confidence
    Technique #2. Now that we've learned to back up our code with a series of tests, we can move on to the second technique. Clean code isn't a straight line. Often, you'll follow a variety of roundabouts, tunnels, and even u-turns to get there. The secret is to play with confidence. Make a small tweak, run the tests, and then decide: "Is this better than before?"
    
3.  Sweat the Small Stuff
    Technique #3. Often, the little things that "don't make a difference" have a way of eventually defining the integrity of your entire codebase. So, yes, do sweat the small stuff (indentation, temporary variables, if statements, etc).
    
4.  Be Strict With Your Controllers
    Technique #4. If you're not careful, it's easy for a controller to quickly get out of hand. All of the sudden, you have countless endpoints and actions - each with its own set of private helper methods. An alternative approach is to strictly adhere to the seven restful actions. If you find yourself reaching for a different name, ask yourself if you can instead create a brand new controller.
    
5.  Drop Down a Level
    Technique #5. Often, you'll find your controller conducting logic that might instead be better managed by the model. In this episode, we'll review a TeamMembersController that suffers from this very issue.
    
6.  An Alternative to Magic Numbers
    Technique #6. A magic number is an important value in your system that isn't instantly clear. If you ever find yourself thinking, "Now what does this number represent," you likely have a magic number on your hands. Instead, consider giving it a name.
    
7.  Avoid Flags
    Technique #7. Particularly when it comes to your public interface, be careful about requiring flags to toggle various functionality. Instead, ask yourself if creating a new method will remove the need for the flag entirely.

8.  The Strategy and Factory Pattern
    Technique #8. If your class contains multiple method with the same prefix, this might be a sign that a few classes are begging to be extracted. In this episode, I'll show you how to combine the strategy and factory patterns to improve a messy controller.

9.  Encapsulated UseCases
    Technique #9. Think of a use case as a class that represents an important user action in your system. A few examples might be RegisterTeam, PurchaseVideo, or BuildServer. These classes should encapsulate all required steps for completing that action. Let's learn how to create one in this episode.

10. Choose Your Class Names Wisely
    Technique #10. Last, but not least, pay special attention to the names you choose for your classes. You might find that the wrong choice will cascade down and affect all of your method names as well.