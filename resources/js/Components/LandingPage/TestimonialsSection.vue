<script setup>
import { ref } from 'vue'
// import { Card, CardContent } from '@/Components/Ui/Card.vue'
import { Star } from 'lucide-vue-next'


const testimonials = ref([
  {
    name: 'Sarah Nakamya',
    role: 'Owner, Kampala Safari Adventures',
    location: 'Kampala, Uganda',
    content:
      "Safari-Link transformed our booking process. We've seen a 300% increase in online reservations and our guests love the seamless payment experience.",
    rating: 5,
    image: '/african-woman-business-owner-smiling.jpg',
  },
  {
    name: 'James Kiprotich',
    role: 'Manager, Mount Elgon Eco Lodge',
    location: 'Mbale, Uganda',
    content:
      'The mobile money integration was a game-changer for us. Our local guests can now pay easily, and international visitors use cards - all in one system.',
    rating: 5,
    image: '/african-man-hotel-manager-professional.jpg',
  },
  {
    name: 'Grace Wanjiku',
    role: 'Director, Maasai Cultural Tours',
    location: 'Nairobi, Kenya',
    content:
      'Managing group bookings used to be chaos. Now everything is organized, automated, and our revenue has doubled in just 6 months.',
    rating: 5,
    image: '/african-woman-tour-guide-traditional-dress.jpg',
  },
])
</script>

<template>
  <section id="testimonials" class="py-20 bg-safari-sand/20">
    <div class="container mx-auto px-4">
      <div class="text-center space-y-4 mb-16">
        <h2 class="text-3xl lg:text-4xl font-bold text-safari-green">
          Trusted by East Africa's leading tourism operators
        </h2>
        <p class="text-lg text-muted-foreground text-pretty max-w-2xl mx-auto">
          See how Safari-Link is helping businesses across Uganda, Kenya, Tanzania, and Rwanda streamline operations
          and increase revenue.
        </p>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <Card
          v-for="(testimonial, index) in testimonials"
          :key="index"
          class="border-safari-green/20"
        >
          <CardContent class="p-6 space-y-4">
            <div class="flex space-x-1">
              <Star
                v-for="i in testimonial.rating"
                :key="i"
                class="h-4 w-4 fill-safari-orange text-safari-orange"
              />
            </div>

            <blockquote class="text-sm leading-relaxed">"{{ testimonial.content }}"</blockquote>

            <div class="flex items-center space-x-3">
              <img
                :src="testimonial.image || '/placeholder.svg'"
                :alt="testimonial.name"
                class="h-12 w-12 rounded-full object-cover"
              />
              <div>
                <div class="font-semibold text-sm">{{ testimonial.name }}</div>
                <div class="text-xs text-muted-foreground">{{ testimonial.role }}</div>
                <div class="text-xs text-safari-green">{{ testimonial.location }}</div>
              </div>
            </div>
          </CardContent>
        </Card>
      </div>
    </div>
  </section>
</template>

<style scoped>
/* All styling handled with Tailwind */
</style>
