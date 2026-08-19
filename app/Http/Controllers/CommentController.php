<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Get approved comments for public website
     */
    public function publicComments()
    {
        $comments = Comment::where('status', 'approved')
            ->orderBy('created_at', 'desc')
            ->get();

        // If table is empty, seed defaults
        if ($comments->isEmpty()) {
            $defaults = [
                [
                    'name' => 'Bun Roeun',
                    'text' => 'CWD Realty & Hospitality manages residential condominium properties while providing flexible rental options for travelers, expatriates, business professionals, and long-term residents. Our experienced multilingual team helps property owners maximize rental income while ensuring guests enjoy a comfortable stay.',
                    'rating' => 5,
                    'initials' => 'BR',
                    'status' => 'approved',
                ],
                [
                    'name' => 'Has Bun',
                    'text' => 'Exceptional service and quick response times. The management team went above and beyond to make my stay in Phnom Penh seamless and relaxing.',
                    'rating' => 5,
                    'initials' => 'HB',
                    'status' => 'approved',
                ],
                [
                    'name' => 'Sophea Kim',
                    'text' => 'High quality residences and professional multilingual staff. Highly recommended for investors and condominium owners.',
                    'rating' => 4,
                    'initials' => 'SK',
                    'status' => 'approved',
                ],
            ];

            foreach ($defaults as $d) {
                Comment::create($d);
            }

            $comments = Comment::where('status', 'approved')->orderBy('created_at', 'desc')->get();
        }

        return response()->json([
            'success' => true,
            'data' => $comments
        ]);
    }

    /**
     * User submits a comment (Frontend) -> Always goes to 'pending' state
     */
    public function submit(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'text' => 'required|string|max:2000',
            'rating' => 'nullable|integer|min:1|max:5',
        ]);

        $initials = Comment::extractInitials($validated['name']);

        $comment = Comment::create([
            'name' => $validated['name'],
            'text' => $validated['text'],
            'rating' => $validated['rating'] ?? 5,
            'initials' => $initials,
            'status' => 'pending', // Awaiting admin approval
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Your comment has been submitted! Please wait for admin approval before it appears on the website.',
            'data' => $comment
        ], 201);
    }

    /**
     * Get all comments for Dashboard (pending + approved + rejected)
     */
    public function index()
    {
        $comments = Comment::orderBy('status', 'asc') // pending first
            ->orderBy('created_at', 'desc')
            ->get();

        $pendingCount = Comment::where('status', 'pending')->count();

        return response()->json([
            'success' => true,
            'data' => $comments,
            'pending_count' => $pendingCount
        ]);
    }

    /**
     * Admin approves a comment
     */
    public function approve(Comment $comment)
    {
        $comment->update(['status' => 'approved']);

        return response()->json([
            'success' => true,
            'message' => 'Comment approved and published to website!',
            'data' => $comment
        ]);
    }

    /**
     * Admin rejects a comment
     */
    public function reject(Comment $comment)
    {
        $comment->update(['status' => 'rejected']);

        return response()->json([
            'success' => true,
            'message' => 'Comment rejected.',
            'data' => $comment
        ]);
    }

    /**
     * Admin deletes a comment
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();

        return response()->json([
            'success' => true,
            'message' => 'Comment deleted successfully!'
        ]);
    }
}
